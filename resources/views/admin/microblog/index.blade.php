@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 微博管理 <span class="c-gray en">&gt;</span> 微博列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <form action="{{url('admin/microblog')}}" method="get">
        <div class="text-c">
            <input type="text" class="input-text" style="width:250px" placeholder="输入内容" id="" name="keywords" value="@if(empty($key)) @else{{$key}} @endif">
            {{--<button type="submit" class="btn btn-success radius" id="" name="sub"><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>--}}
            <input type="submit" value="搜索" class="btn btn-success radius">
        </div>
        </form>
        {{--<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r"></span> </div>--}}
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th >id</th>
                    <th >登录邮箱</th>
                    <th >登录手机号</th>
                    <th >内容</th>
                    <th >发表时间</th>
                    <th >阅读量</th>
                    <th >评论次数</th>
                    <th >转发次数</th>
                    <th >点赞数</th>
                    <th >评论</th>
                    <th >显示状态</th>
                    {{--<th >操作</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                <tr class="text-c">
                    <td>{{$v->mid}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->phone}}</td>
                    <td><a style="cursor:pointer" class="text-primary" onclick="article_conten('查看','{{url('admin/content/'.$v->mid.'/edit')}}','10002')" href="javascript:;" title="查看">内容详情</a></td>
                    <td>{{date('Y-m-d H:i:s',($v->ctime))}}</td>
                    <td>{{$v->mcount}}</td>
                    <td>{{$v->c_count}}</td>
                    <td>{{$v->t_count}}</td>
                    <td>{{$v->p_count}}</td>
                    <td><a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/comment/'.$v->mid)}}','10002')" href="javascript:;" title="查看">评论详情</a></td>
                    <td>{{$v->status}}</td>
                    {{--<td class="td-manage">--}}
                        {{--<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">--}}
                            {{--<i class="Hui-iconfont">&#xe6df;</i>--}}
                        {{--</a>--}}
                        {{--<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none">--}}
                            {{--<i class="Hui-iconfont">&#xe6e2;</i>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                </tr>
                @endforeach
                </tbody>

            </table>

                {!! $data->appends(['key' => $key])->render() !!}
        </div>
    </div>


    <!--请在下方写此页面业务相关的脚本-->

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
        function article_conten(title,url,id,w,h){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
    </script>
@endsection
