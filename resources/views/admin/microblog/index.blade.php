@extends('admin.layout.blank')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 微博管理 <span class="c-gray en">&gt;</span> 微博列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入用户名称、导航" id="" name="">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th ><input type="checkbox" name="" value=""></th>
                    <th >微博id</th>
                    <th >用户</th>
                    <th >导航id</th>
                    <th >标签id</th>
                    <th >显示状态</th>
                    <th >内容</th>
                    <th >发表时间</th>
                    <th >阅读量</th>
                    <th >评论次数</th>
                    <th >转发次数</th>
                    <th >点赞数</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c">
                    <td><input type="checkbox" value="1" name=""></td>
                    @foreach ($data as $k=>$v)
                    <td>{{$v->mid}}</td>
                    <td>{{$v->uid}}</td>
                    <td>{{$v->nid}}</td>
                    <td>{{$v->tid}}</td>
                    <td>{{$v->status}}</td>
                    <td>{{$v->content}}</td>
                    <td>{{$v->ctime}}</td>
                    <td>{{$v->mcount}}</td>
                    <td>{{$v->c_count}}</td>
                    <td>{{$v->t_count}}</td>
                    <td>{{$v->p_count}}</td>
                    @endforeach
                    <td class="td-manage">
                        <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6df;</i>
                        </a>
                        <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection