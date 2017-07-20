@extends('admin.layout.blank')
@section('title')
<title>系统日志</title>
@endsection
@section('body')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	系统日志
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form action="" id="search_form">
	<div class="text-c"> 日期范围：

		<input type="text" name="s_time" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;" value="@if(!empty($s_time)){{$s_time}}@endif">
		-
		<input type="text" name="e_time" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;" value="@if(!empty($e_time)){{$e_time}}@endif">
		<input type="text" name="content" id="" placeholder="日志名称" style="width:250px" class="input-text" value="@if(!empty($content)){{$content}}@endif">
		<button name="" id="btn_search" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜日志</button>

	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">


	</div>
	<table class="table table-border table-bordered table-bg table-hover table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="17%">用户名</th>
				<th>内容</th>
				<th width="120">客户端IP</th>
				<th width="120">操作时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $k=>$v)
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td>{{$v->id}}</td>

				<td>{{$v->username}}</td>
				<td>{{$v->content}}</td>
				<td>{{long2ip($v->ip)}}</td>
				<td>{{date('Y-m-d H:i:s',$v->ctime)}}</td>
				<td><a title="删除" href="javascript:;" onclick="system_log_del(this,'10001')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $data->appends(['content' => $content,'s_time'=>$s_time,'e_time'=>$e_time])->render() !!}
</div>
@endsection
@section('js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">



/*搜索*/
$('#btn_search').submit(function(){
   $.get('{{url('admin/log')}}',$('#search_form').serialize(),function(){

   });
});
/*日志-删除*/
function system_log_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
