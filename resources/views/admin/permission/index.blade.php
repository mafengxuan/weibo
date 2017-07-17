@extends('admin.layout.blank')
@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 权限管理 <span class="c-gray en">&gt;</span> 权限列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" onclick="article_edit('添加权限','{{url('admin/permission/create')}}','10002')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加权限</a></span></div>
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">

                <th>权限ID</th>

                <th>权限描述</th>
                <th>路由名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($data as $k=>$v)
            <tr style="line-height:20px;" class="text-c">
                <td>{{$v->id}}</td>

                <td style="text-align: left;">{{$v->_description}}</td>
                <td>{{$v->name}}</td>
                <td class="td-manage">
                    @if($v->pid == 0)
                    <a style="text-decoration:none" class="ml-5" onclick="article_edit('添加子权限','{{url('admin/addson/'.$v->id)}}','10002')" href="javascript:;" title="添加子权限"><i class="Hui-iconfont">添加子权限</i></a>
                    @endif
                    <a style="text-decoration:none" class="ml-5" onclick="article_edit('修改','{{url('admin/permission/'.$v->id.'/edit')}}','10002')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
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