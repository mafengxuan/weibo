@extends('admin.layout.blank')

@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入用户名、电话、邮箱" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>8</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="50">ID</th>
                <th width="50">uid</th>
                <th width="50">生日</th>
                <th width="60">QQ</th>
                <th width="70">地址</th>
                <th width="40">性别</th>
                <th width="50">年龄</th>
                <th width="100">简介</th>
                <th width="60">注册时间</th>
                <th width="90">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                @foreach($data as $k=>$v)
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$v->id}}</td>
                <td>{{$v->uid}}</td>
                {{--<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>--}}
                <td>{{$v->birth}}</td>
                <td>{{$v->qq}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->sex}}</td>
                <td>{{$v->age}}</td>
                <td>{{$v->introduction}}</td>
                <td>{{date('Y-m-d H:i:s')}}</td>
                <td class="td-manage"><a href="">修改</a>
                    <a href="">删除</a></td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
</div>
{!! $data->render() !!}

@endsection
@section('js')

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
@endsection
