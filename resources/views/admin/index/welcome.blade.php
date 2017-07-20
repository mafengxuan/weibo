@extends('admin.layout.blank')

@section('title')
<title>我的桌面</title>
@endsection

@section('body')


<div class="page-container">
	<p class="f-20 text-success">lamp182-微博<span class="f-14"> </span>后台首页</p>

	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>服务器IP地址</td>
				<td>{{$_SERVER['SERVER_ADDR']}}</td>
			</tr>

			<tr>
				<td>服务器域名</td>
				<td>{{$_SERVER['SERVER_NAME']}}</td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>{{$_SERVER['SERVER_PORT']}}</td>
			</tr>

			<tr>
				<td>服务器操作系统 </td>
				<td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
			</tr>

			<tr>
				<td>服务器的语言种类 </td>
				<td>{{$_SERVER['HTTP_ACCEPT_LANGUAGE']}}</td>
			</tr>

			<tr>
				<td>服务器当前时间 </td>
				{{--<td>{{$_SERVER['REQUEST_TIME_FLOAT']}}</td>--}}
				<td>{{  date('Y年m月d日 H:i:s',time()) }}</td>
			</tr>

		</tbody>
	</table>
</div>


@endsection