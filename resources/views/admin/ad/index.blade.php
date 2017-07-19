@extends('admin.layout.blank')
@section('body')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form action="{{url('admin/ad')}}" method="get">
            <input type="text" name="keywords" id="" placeholder=" 广告名称" style="width:250px" class="input-text" value="@if(empty($key))@else{{$key}}@endif">
            {{--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>--}}
            <input class="btn btn-success" type="submit" value="搜索">
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;"></a> <a class="btn btn-primary radius" onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加广告</a></span></div>
    {{--<div class="mt-20">                                                                                                                                                                                              <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;" title="查看">添加广告</a>                                                                                               --}}
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
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
            @foreach ($data as $k=>$v)
            <tr style="line-height:20px;" class="text-c">
                <td>{{$v->aid}}</td>
                <td>{{$v->pid}}</td>
                <td><img src="{{$v->ad_img}}" style="width:100px; height:62px;"></td>
                <td>{{$v->ad_name}}</td>
                <td>{{$v->username}}</td>
                <td>{{date('Y-m-d',$v->ad_ctime)}}</td>
                <td class="td-status"><span class="label label-success radius">{{$status[$v->status]}}</span></td>
                <td class="td-manage"><a style="text-decoration:none" class="ml-5" onclick="article_edit('查看','{{url('admin/ad/'.$v->aid.'/edit')}}','10002')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onclick="Delarticle({{$v->aid}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            {{--</tr>                                                                                           <a style="cursor:pointer" class="text-primary" onclick="article_edit('查看','{{url('admin/ad/create')}}','10002')" href="javascript:;" title="查看">添加广告</a>--}}
            @endforeach
            </tbody>
        </table>

            {!! $data->appends(['key'=>$key])->render() !!}
    <script>
    function article_edit(title,url,id,w,h){
    var index = layer.open({
    type: 2,
    title: title,
    content: url
    });
    layer.full(index);
    }

    function Delarticle(user_id){
        //询问框
        layer.confirm('是否确认删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //           url ==> admin/user/{user}   http://project182.com/admin/user/2
            $.post("{{url('admin/ad/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
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

    </div>
</div>
@endsection