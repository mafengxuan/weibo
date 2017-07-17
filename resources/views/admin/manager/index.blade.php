@extends('admin.layout.blank')

@section('body')
    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="{{url('admin/manager')}}" method="get">
        <div class="text-c">
        <input type="text" class="input-text" style="width:250px" value="@if(empty($key)) @else{{$key}}  @endif" placeholder="输入管理员名称" id="" name="keywords">
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
        </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="{{url('admin/manager/create')}}"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>2</strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">管理员列表</th>
        </tr>
        <tr class="text-c">
            <th width="40">ID</th>
            <th width="150">用户账号</th>
            <th width="150">担任角色</th>
            <th width="150">登录时间</th>
            <th width="150">注册时间</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k=>$v)
        <tr class="text-c">
            <td>{{$v->aid}}</td>
            <td>{{$v->username}}</td>
            <td>{{$v->name}}</td>
            <td>{{date('Y-m-d H:i:s')}}</td>
            <td>{{date('Y-m-d H:i:s')}}</td>
            <td class="td-manage">
                <a  href="{{url('admin/manager/'.$v->id.'/edit')}}">重置密码</a>
                <a  href="javascript:;" onclick="DelUser({{$v->id}})">删除</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <?php
    $key = empty($key)?'':$key;
    ?>
</div>
{!! $data->appends(['keywords'=>$key])->render() !!}
@endsection
@section('js')
<!--_footer 作为公共模版分离出去-->
{{--<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>--}}
{{--<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>--}}
{{--<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>--}}
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
</script>
<script>

    function DelUser(id){
        //询问框
        layer.confirm('是否确认删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/manager')}}/"+id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            });


        }, function(){

        });

    }


</script>
@endsection