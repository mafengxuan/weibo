@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告位管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            <form action="{{url('admin/adPosition')}}" method="get">
                <input type="text" name="keywords" id="" placeholder=" 广告名称" style="width:250px" class="input-text" value="@if(empty($key)) @else {{$key}} @endif">
                {{--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>--}}
                <input class="btn btn-success" type="submit" value="搜索">
            </form>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','picture-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加广告位</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th><input name="" type="checkbox" value=""></th>
                    <th>ID</th>
                    <th>版位名称</th>
                    <th>广告id</th>
                    <th>广告名称</th>
                    <th>广告位唯一标识</th>
                    <th>收费标准</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $k=>$v)
                    <tr class="text-c">
                        <td><input name="" type="checkbox" value=""></td>

                        <td>{{$v->pid}}</td>
                        <td>{{$v->p_name}}</td>
                        <td>{{$v->aid}}</td>
                        <td>{{$v->ad_name}}</td>
                        <td>{{$v->ad_tag}}</td>
                        <td>{{$v->standard}}</td>
                        <td class="td-status"><span class="label label-success radius">{{$status[$v->status]}}</span></td>
                        <td class="td-manage"><a style="text-decoration:none" class="ml-5" onClick="picture_edit('图库编辑','picture-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>

                        {{--<img width="210" class="picture-thumb" src="temp/200x150.jpg">--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--{!! $data->appends(['keywords'=>$key])->render() !!}--}}
        </div>
    </div>
@endsection