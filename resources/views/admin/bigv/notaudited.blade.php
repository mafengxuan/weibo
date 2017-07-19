@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>

@endsection
@section('body')
    <body>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" href="{{url('admin/bigv')}}"><i class="Hui-iconfont"></i> 已审核</a></span>
        <div class="page-container">

            <form action="{{url('admin/bigv')}}" mehtod="get">
                <div class="text-c"> 日期范围：
                    <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;" name="s_time">
                    -
                    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;" name="e_time">
                    <input type="text" class="input-text" style="width:250px" placeholder="输入大V名称" id="" name="v_name">
                    <input type="submit" class="btn btn-success radius" id="" name="sub" value="查询"><i class="Hui-iconfont">&#xe665;</i>
                </div>
            </form>

            <div class="mt-20">
                <table class="table table-border table-bordered table-hover table-bg table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="80">ID</th>
                        <th width="100">用户账号</th>
                        <th width="40">类型</th>
                        <th width="90">认证名称</th>
                        <th width="130">申请提交时间</th>
                        <th width="70">审核状态</th>
                        <th width="50">操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $k=>$v)
                        <tr class="text-c">
                            <td>{{$v->v_id}}</td>
                            <td>{{$v->username}}</td>
                            @if($v->type==1)
                            <td>网红</td>
                            @elseif($v->type==2)
                            <td>名人</td>
                            @elseif($v->type==3)
                            <td>机构</td>
                            @endif
                            <td>{{$v->v_name}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->p_time)}}</td>
                            @if($v->status == 2)
                                <td class="td-status">未审核</td>
                            @endif
                            <td>
                                <a href="javascript:;" onclick="yaudited({{$v->v_id}},{{$v->uid}})">通过</a>&nbsp
                                <a href="javascript:;" onclick="naudited({{$v->v_id}},{{$v->uid}})">驳回</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {!! $data->appends(['v_name'=>$v_name,'s_time'=>$s_time,'e_time'=>$e_time])->render() !!}

            </div>
        </div>
    </div>
    </body>
    <script>



        function yaudited(v_id,uid){

            //询问框
            layer.confirm('是否确认审核通过？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.post("{{url('admin/bigv')}}/"+v_id,{'uid':uid,'sta':1,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
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
        function naudited(v_id,uid){
            //询问框
            layer.confirm('是否确认审核驳回？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.post("{{url('admin/bigv')}}/"+v_id,{'uid':uid,'sta':2,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
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