@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 导航管理 <span class="c-gray en">&gt;</span> 导航列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <form action="{{url('admin/navigation')}}" method="get">
            <div class="text-c">
                <input type="text" class="input-text" style="width:250px" placeholder="输入内容" id="" name="keywords" value="@if(empty($key)) @else{{$key}} @endif">
                {{--<button type="submit" class="btn btn-success radius" id="" name="sub"><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>--}}
                <input type="submit" value="搜索" class="btn btn-success radius">
            </div>
        </form>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a class="btn btn-primary radius" onclick="article_edit('查看','{{url('admin/navigation/create')}}','10002')" href="javascript:;">
                    <i class="Hui-iconfont">&#xe600;</i> 添加导航
                </a>
            </span>
            {{--<span class="r">--}}
                {{--<a class="btn btn-primary radius" onclick="article_edit('查看','{{url('admin/navigation/create')}}','10002')" href="javascript:;">--}}
                    {{--<i class="Hui-iconfont"></i> 排序--}}
                {{--</a>--}}
            {{--</span>--}}
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th >排序</th>
                    <th >导航名称</th>
                    <th >导航url</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr class="text-c">
                        <td><input type="text" value="{{$v->nav_sort}}" onchange="changeOrder(this,{{$v->nid}})" style="width:15px;"></td>

                        <td>{{$v->nav_name}}</td>
                        <td>{{$v->nav_url}}</td>

                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="article_edit('编辑','{{url('admin/navigation/'.$v->nid.'/edit')}}','4','','510')" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                            {{--<a style="text-decoration:none" class="ml-5" onclick="article_edit('查看','{{url('admin/navigation/'.$v->nid.'/edit')}}','10002')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>--}}
                            <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->nid}})" href="javascript:;" title="删除">
                                <i class="Hui-iconfont">&#xe6e2;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
                {!! $data->appends(['keywords' => $key])->render() !!}
        </div>
    </div>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript"></script>
    <script>
        function article_edit(title,url,id,w,h){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        function Delarticle(nid) {
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('admin/navigation/')}}/" + nid, {
                    '_method': 'DELETE',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    } else {
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });


            }, function () {

            });
        }

        function changeOrder(obj,nid){
//            获取修改后的排序号
            var nav_sort =  $(obj).val();
            $.post('{{url('admin/navigation/changeorder')}}',{'_token':"{{csrf_token()}}",'nid':nid,'nav_sort':nav_sort},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            })
        }

    </script>
@endsection