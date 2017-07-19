@extends('admin.layout.blank')

@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="{{url('admin/user')}}" method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:250px" placeholder="输入真实姓名" value="{{$key}} "id="" name="keywords">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span> <span class="r">共有数据：<strong>8</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th>uid</th>
                <th>真实姓名</th>
                <th>QQ</th>
                <th>邮箱</th>
                <th>手机号</th>
                <th>生日</th>
                <th>年龄</th>
                <th>地址</th>
                <th>用户类型</th>
                <th>邮箱状态</th>
                <th>注册时间</th>
                <th>最后一次登录时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $k=>$v)
            <tr class="text-c">
                <td>{{$v['uid']}}</td>
                <td>{{$v['realname']}}</td>
                <td>{{$v['qq']}}</td>
                <td>{{$v['email']}}</td>
                <td>{{$v['phone']}}</td>
                <td>{{date('Y年m月d日',$v['birth'])}}</td>
                <td>{{$v['age']}}</td>
                <td>{{$v['address']}}</td>
                @if($v['type'] == 1)
                <td>普通用户</td>
                @elseif($v['type'] == 2)
                    <td>企业用户</td>
                @elseif($v['type'] == 3)
                    <td>商业用户</td>
                @elseif($v['type'] == 4)
                    <td>大V用户</td>
                @endif
                @if($v['status'] == 2)
                <td>已激活</td>
                @else
                    <td>未激活</td>
                @endif
                <td>{{date('Y-m-d H:i:s',$v['rtime'])}}</td>
                <td>{{date('Y-m-d H:i:s',$v['login_time'])}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <?php
        $key = empty($key)?'':$key;
        ?>
    </div>

    {!! $user->appends(['keywords'=>$key])->render() !!}
</div>
@endsection
@section('js')

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
@endsection
