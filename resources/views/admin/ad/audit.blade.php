@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告审核 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            <form action="{{url('admin/audit')}}" method="get">
                <input type="text" name="keywords" id="" placeholder=" 广告名称" style="width:250px" class="input-text" value="@if(empty($key)) @else {{$key}} @endif">
                <input class="btn btn-success" type="submit" value="搜索">
            </form>
        </div>

        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th>ID</th>
                    <th>广告位</th>
                    <th>广告图片</th>
                    <th>广告名称</th>
                    <th>用户</th>
                    <th>注册时间</th>
                    <th>发布状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr class="text-c">
                        <td>{{$v->aid}}</td>
                        <td>{{$v->pid}}</td>
                        <td><img src="{{$v->ad_img}}" width="100"></td>
                        <td>{{$v->ad_name}}</td>
                        <td>{{$v->username}}</td>
                        <td>{{date('Y-m-d',$v->ad_ctime)}}</td>
                        <td class="td-status"><span class="label label-success radius">{{$status[$v->status]}}</span></td>
                        <td>
                            @if ($v->status ==4)
                            <a href="javascript:;" onclick="charge({{$v->aid}})">收费通过</a>&nbsp;
                            @else
                            <a href="javascript:;" onclick="Editaudit({{$v->aid}})">通过</a>&nbsp;
                            @endif
                            <a href="javascript:;" onclick="Delaudit({{$v->aid}})">驳回</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


                {!! $data->appends(['keywords'=>$key])->render() !!}
            <script>
                function Editaudit(aid){
                    //询问框
                    layer.confirm('是否确认审核通过？', {
                        btn: ['确定','取消'] //按钮
                    }, function(){
                        //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                        $.post("{{url('admin/audit/')}}/"+aid,{'sta':1,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
                            if(data.status == 0){
                                location.href = location.href;
                                layer.msg(data.msg, {icon: 6});
                            }else{
                                location.href = location.href;
                                layer.msg(data.msg, {icon: 5});
                            }
                        });


                    }, function(){

                    });

                }
                function charge(aid){
                    //询问框
                    layer.confirm('是否确认收费通过？', {
                        btn: ['确定','取消'] //按钮
                    }, function(){
                        //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                        $.post("{{url('admin/charge/')}}/"+aid,{'sta':1,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
                            if(data.status == 0){
                                location.href = location.href;
                                layer.msg(data.msg, {icon: 6});
                            }else{
                                location.href = location.href;
                                layer.msg(data.msg, {icon: 5});
                            }
                        });


                    }, function(){

                    });

                }
                function Delaudit(aid){
                    //询问框
                    layer.confirm('是否确认审核驳回？', {
                        btn: ['确认','取消'] //按钮
                    }, function(){
                        $.post("{{url('admin/audit/')}}/"+aid,{'sta':2,'_method':'PUT','_token':"{{csrf_token()}}"},function(data){
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

        </div>
    </div>
@endsection