@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 导航管理 <span class="c-gray en">&gt;</span> 导航列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <form action="{{url('admin/label')}}" method="get">
            <div class="text-c">
                <input type="text" class="input-text" style="width:250px" placeholder="输入内容" id="" name="keywords" value="@if(empty($key)) @else{{$key}} @endif">
                {{--<button type="submit" class="btn btn-success radius" id="" name="sub"><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>--}}
                <input type="submit" value="搜索" class="btn btn-success radius">
            </div>
        </form>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" onclick="article_edit('查看','{{url('admin/label/create')}}','10002')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加标签</a></span> <span class="r"></span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">

                    <th >id</th>
                    <th >标签名称</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr class="text-c">

                        <td>{{$v->tid}}</td>
                        <td>{{$v->tname}}</td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="article_edit('编辑','{{url('admin/label/'.$v->tid.'/edit')}}','4','','510')" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                            <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->tid}})" href="javascript:;" title="删除">
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
        function Delarticle(tid) {
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/label/')}}/" + tid, {
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

    </script>
@endsection