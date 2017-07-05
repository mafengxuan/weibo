@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 评论列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <form action="{{url('admin/comment')}}" method="get">
            <div class="text-c">
                <input type="text" class="input-text" style="width:250px" placeholder="输入内容" id="" name="keywords" value="@if(empty($key)) @else{{$key}} @endif">
                {{--<button type="submit" class="btn btn-success radius" id="" name="sub"><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>--}}
                <input type="submit" value="搜索" class="btn btn-success radius">
            </div>
        </form>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th ><input type="checkbox" name="" value=""></th>
                    <th >评论id</th>
                    <th >微博id</th>
                    <th >用户id</th>
                    <th >内容</th>
                    <th >评论时间</th>
                    <th >点赞数</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr class="text-c">

                        <td><input type="checkbox" value="1" name=""></td>
                        <td>{{$v->cid}}</td>
                        <td>{{$v->mid}}</td>
                        <td>{{$v->uid}}</td>
                        <td>{{$v->content}}</td>
                        <td>{{$v->ctime}}</td>
                        <td>{{$v->p_count}}</td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none">
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


@endsection
