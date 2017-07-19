<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="{{asset('/admin')}}/favicon.ico" >
<LINK rel="Shortcut Icon" href="{{asset('/admin')}}/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('/admin')}}/lib/html5shiv.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/lib/respond.min.js"></script>

<![endif]-->

<link rel="stylesheet" href="{{asset('/admin')}}/bootstrap/css/bootstrap.min.css">
<script src="{{asset('/admin')}}/bootstrap/js/jquery.min.js"></script>
<script src="{{asset('/admin')}}/bootstrap/js/bootstrap.min.js"></script>

<link href="{{asset('/admin')}}/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/admin')}}/static/h-ui.admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/admin')}}/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
@section('css')
@show

<!--[if IE 6]>
<script type="text/javascript" src="{{asset('/admin')}}/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
@section('title')

@show
</head>
<body>
@section('body')

@show
<script type="text/javascript" src="{{asset('/admin')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{asset('/admin')}}/static/h-ui.admin/js/H-ui.admin.js"></script>
{{--<script type="text/javascript" src="{{asset('/admin')}}/layer/layer.js"></script>--}}
@section('js')
@show
</body>
</html>