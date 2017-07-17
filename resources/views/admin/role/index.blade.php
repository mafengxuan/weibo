@extends('admin.layout.blank')
@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 角色管理 <span class="c-gray en">&gt;</span> 角色列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" onclick="admin_role_add('添加角色','{{url('admin/role/create')}}','800')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a></span></div>
    <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">

                <th>角色ID</th>
                <th>角色名称</th>
                <th>角色描述</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($data as $k=>$v)
            <tr style="line-height:20px;" class="text-c">
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->description}}</td>
                <td class="td-manage">
                    <a style="text-decoration:none" class="ml-5" onclick="admin_role_edit('修改','{{url('admin/role/'.$v->id.'/edit')}}','800')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onclick="admin_role_del({{$v->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>


    <script>
    /*管理员-角色-添加*/
    function admin_role_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-编辑*/
    function admin_role_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }

    function admin_role_del(user_id){
        //询问框
        layer.confirm('是否确认删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/role/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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