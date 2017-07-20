@extends('admin.layout.blank')
@section('body')

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 友情链接 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">

        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;"></a> <a class="btn btn-primary radius" onclick="article_edit('查看','{{url('admin/link/create')}}','10002')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加友情链接</a></span>  </div>
        {{--<div class="mt-20">                                                                                                                                                                                              <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;" title="查看">添加广告</a>                                                                                               --}}
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>链接地址</th>
                <th>链接标题</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $k=>$v)
                <tr style="line-height:20px;" class="text-c">
                    <td><input type="text" value="{{$v->link_sort}}" onchange="changeOrder(this,{{$v->lid}})" style="width:15px;"></td>
                    <td>{{$v->lid}}</td>
                    <td>{{$v->link_name}}</td>
                    <td>{{$v->link_url}}</td>
                    <td>{{$v->link_title}}</td>
                    <td class="td-status"><span class="label label-success radius">{{$status[$v->status]}}</span></td>
                    <td class="td-manage"><a style="text-decoration:none" class="ml-5" onclick="article_edit('查看','{{url('admin/link/'.$v->lid.'/edit')}}','10002')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->lid}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function changeOrder(obj,lid){
//            获取修改后的排序号
                var link_sort =  $(obj).val();
                $.post('{{url('admin/link/changeorder')}}',{'_token':"{{csrf_token()}}",'lid':lid,'link_sort':link_sort},function(data){
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                })
            }

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
                    $.post("{{url('admin/link/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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