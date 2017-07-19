@extends('admin.layout.blank')
@section('body')
</head>
<style>
    .xxoo{
        margin-left:300px;
    }
</style>
<body>
<article class="page-container">
    @section('body')
        @if (count($errors) > 0)
            <div class="mark"  style="color:red">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li class="xxoo">{{ $error }}</li>
                        @endforeach
                    @else
                        <li class="xxoo">{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
        <form class="form form-horizontal" id="form-admin-add" action="{{url('admin/dorepass')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="text" class="input-text" value="{{session('user')->username}}" placeholder="" id="username" name="username" disabled>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>旧密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="请输入旧密码" id="password" name="password_o">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="请输入新密码" id="password" name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="再次确认密码" id="password" name="password_c">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
</article>
@endsection
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>