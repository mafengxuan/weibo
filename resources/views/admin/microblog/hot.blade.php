@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        热门管理
        <span class="c-gray en">&gt;</span>
        每日热点
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add">
            <div id="tab-system" class="HuiTab">
                <div class="tabBar cl">
                    <span>每日热点</span>
                    <span>时事热点</span>
                </div>
                <div class="tabCon">

                    <div class="mt-20">
                        <table class="table table-border table-bordered table-hover table-bg table-sort">
                            <thead>
                            <tr class="text-c">
                                <th >id</th>
                                <th >阅读量</th>
                                <th >评论次数</th>
                                <th >点赞数</th>
                                <th >内容</th>
                                {{--<th >操作</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data1 as $k=>$v)
                                <tr class="text-c">
                                    <td>{{$v->mid}}</td>
                                    <td>{{$v->mcount}}</td>
                                    <td>{{$v->c_count}}</td>
                                    <td>{{$v->p_count}}</td>
                                    <td><a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/hotcontent/'.$v->mid.'/edit')}}','10002')" href="javascript:;" title="查看">内容详情</a></td>
                                    {{--<td class="td-manage">--}}
                                        {{--<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none">--}}
                                            {{--<i class="Hui-iconfont">&#xe6e2;</i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>


            <div class="tabCon">

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th >id</th>
                            <th >发布时间</th>
                            <th >内容</th>
                            {{--<th >操作</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data2 as $k=>$v)
                            <tr class="text-c">
                                <td>{{$v->mid}}</td>
                                <td>{{date('Y-m-d H:i:s',time($v->ctime))}}</td>
                                <td><a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/currentevent/'.$v->mid.'/edit')}}','10002')" href="javascript:;" title="查看">内容详情</a></td>
                                {{--<td class="td-manage">--}}
                                    {{--<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none">--}}
                                        {{--<i class="Hui-iconfont">&#xe6e2;</i>--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    </div>
                </div>
            </div>
        </form>
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
        $(function(){
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });
            $.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
        });

    </script>


@endsection
@section('js')
    <script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script>


@show