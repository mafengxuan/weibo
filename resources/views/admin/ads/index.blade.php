@extends('admin.layout.blank')
@section('body')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 图片列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
        <input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
        <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="picture_add('添加图片','picture-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th><input name="" type="checkbox" value=""></th>
                <th>ID</th>
                <th>广告位</th>
                <th>广告图片</th>
                <th>广告名称</th>
                <th>用户</th>
                <th>注册时间</th>
                <th>发布状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            {{--<tr class="text-c">--}}
                {{--<td><input name="" type="checkbox" value=""></td>--}}
                {{--@foreach ($data as $k=>$v)--}}
                {{--<td>{{$v->aid}}</td>--}}
                {{--<td>{{$v->pid}}</td>--}}
                {{--<td><a href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">{{$v->ad_img}}</a></td>--}}
                {{--<td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('图库编辑','picture-show.html','10001')">ad_name</a></td>--}}
                {{--<td class="text-c">{{$v->username}}</td>--}}
                {{--<td>{{$v->ad_ctime}}</td>--}}
                {{--<td class="td-status"><span class="label label-success radius">{{$v->status}}</span></td>--}}
                {{--<td class="td-manage"><a style="text-decoration:none" onClick="picture_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_edit('图库编辑','picture-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>--}}
                {{--@endforeach--}}
                {{--<img width="210" class="picture-thumb" src="temp/200x150.jpg">--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>
</div>
@endsection