@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>

@endsection
@section('body')

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" href="{{url('admin/commerce')}}"><i class="Hui-iconfont"></i> 已审核</a></span>
        <div class="page-container">

            <form action="{{url('admin/commerce')}}" mehtod="get">
                <div class="text-c"> 日期范围：
                    <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;" name="s_time">
                    -
                    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;" name="ed">
                    <input type="text" class="input-text" style="width:250px" placeholder="输入公司名称" id="" name="company_name">
                    <input type="submit" class="btn btn-success radius" id="" name="sub" value="查询"><i class="Hui-iconfont">&#xe665;</i>
                </div>
            </form>

            <div class="mt-20">
                <table class="table table-border table-bordered table-hover table-bg table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="80">ID</th>
                        <th width="100">公司名称</th>
                        <th width="40">申请人</th>
                        <th width="90">合作关系</th>
                        <th width="130">申请提交时间</th>
                        <th width="70">审核状态</th>
                        <th width="50">操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $k=>$v)
                        <tr class="text-c">
                            <td>{{$v->commerce_id}}</td>
                            <td>{{$v->company_name}}</td>
                            <td>{{$v->username}}</td>
                            <td>{{$v->cooperation}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->p_time)}}</td>
                            @if($v->status != 1)
                                <td class="td-status">未审核</td>
                            @endif
                            <td>
                                <a href="javascript:;" onclick="yaudited({{$v->commerce_id}},{{$v->uid}})">通过</a>&nbsp
                                <a href="javascript:;" onclick="naudited({{$v->commerce_id}},{{$v->uid}})">驳回</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {!! $data->appends(['company_name'=>$company_name,'s_time'=>$s_time,'e_time'=>$e_time])->render() !!}

            </div>
        </div>

    <script>



        function yaudited(commerce_id,uid){

            //询问框
            layer.confirm('是否确认审核通过？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.post("{{url('admin/commerce')}}/"+commerce_id,{'uid':uid,'sta':1,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
                    if(data.status==0){
                        layer.msg(data.msg,{icon:6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg,{icon:5});
                        location.href = location.href;
                    }
                });
            }, function(){

            });


        }
    </script>


    <script>
        function naudited(commerce_id,uid){
            //询问框
            layer.confirm('是否确认审核驳回？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.post("{{url('admin/commerce')}}/"+commerce_id,{'uid':uid,'sta':2,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
                    if(data.status==0){
                        layer.msg(data.msg,{icon:6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg,{icon:5});
                        location.href = location.href;
                    }
                });
            }, function(){

            });
        }


    </script>
@endsection