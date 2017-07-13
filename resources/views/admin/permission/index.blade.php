@extends('admin.layout.blank')
@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 权限管理 <span class="c-gray en">&gt;</span> 权限列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" onclick="article_edit('添加权限','{{url('admin/permission/create')}}','10002')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加权限</a></span></div>
    {{--<div class="mt-20">                                                                                                                                                                                              <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/permission/create')}}','10002')" href="javascript:;" title="查看">添加权限</a>                                                                                               --}}
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">

                <th>权限ID</th>
                <th>路由名称</th>
                <th>权限描述</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $k=>$v)
            <tr style="line-height:20px;" class="text-c">
                <td><input name="" type="checkbox" value=""></td>
                <td>{{$v->aid}}</td>
                <td>{{$v->pid}}</td>
                <td><img src="/{{$v->ad_img}}" width="100"></td>
                <td>{{$v->ad_name}}</td>
                <td>{{$v->username}}</td>
                <td>{{date('Y-m-d H:i:s',$v->ad_ctime)}}</td>
                <td class="td-status"><span class="label label-success radius">{{$status[$v->status]}}</span></td>
                <td class="td-manage"><a style="text-decoration:none" class="ml-5" onclick="article_edit('查看','{{url('admin/permission/'.$v->aid.'/edit')}}','10002')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->aid}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            {{--</tr>                                                                                           <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/permission/create')}}','10002')" href="javascript:;" title="查看">添加权限</a>--}}
            @endforeach
            </tbody>
        </table>


    <script>
    function article_edit(title,url,id,w,h){
    var index = layer.open({
    type: 2,
    title: title,
    content: url
    });
    layer.full(index);
    }

    function Delarticle(user_id){
        //询问框
        layer.confirm('是否确认删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //           url ==> admin/user/{user}   http://project182.com/admin/user/2
            $.post("{{url('admin/permission/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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
    </script>

    </div>
</div>
@endsection