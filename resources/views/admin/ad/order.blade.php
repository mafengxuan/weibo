@extends('admin.layout.blank')
@section('body')

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 收费管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            <form action="{{url('admin/order')}}" method="get">
                <input type="text" name="keywords" id="" placeholder=" 购买人名称" style="width:250px" class="input-text" value="@if(empty($key))@else{{$key}}@endif">
                {{--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>--}}
                <input class="btn btn-success" type="submit" value="搜索">
            </form>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" > <a onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;"></a></span> <span class="r">共有数据：<strong>45</strong> 条</span> </div>
        {{--<div class="mt-20">                                                                                                                                                                                              <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;" title="查看">添加广告</a>                                                                                               --}}
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th><input name="" type="checkbox" value=""></th>
                <th>ID</th>
                <th>广告ID</th>
                <th>广告位ID</th>
                <th>购买人</th>
                <th>购买天数</th>
                <th>收费金额</th>
                <th>下单时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $k=>$v)
                <tr style="line-height:20px;" class="text-c">
                    <td><input name="" type="checkbox" value=""></td>
                    <td>{{$v->oid}}</td>
                    <td>{{$v->aid}}</td>
                    <td>{{$v->pid}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->num}}</td>
                    <td>{{$v->price}}</td>
                    <td>{{$v->o_time}}</td>
            @endforeach
            </tbody>
        </table>

        {!! $data->appends(['key'=>$key])->render() !!}

    </div>
    </div>
@endsection