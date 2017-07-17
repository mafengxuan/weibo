<!DOCTYPE html>
<head>
	<title>手机号注册</title>
	<style type="text/css">
		.form-control{
			margin-bottom: 2px;
		}
	</style>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="{{asset('home/zhuce/js/jquery-1.11.1.min.js')}}"></script>
	<link href="{{asset('/home/zhuce/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('/home/zhuce/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('/home/zhuce/css/templatemo_style.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">手机号注册</h1>
	<div class="container">
		<div class="col-md-12" id="doc-my-tabs">
			<form class="form-horizontal templatemo-create-account templatemo-container" action="{{url('/home/zhuce/insert')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-inner">
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="username" class="control-label"><span style="color:red">*</span><b>手机号</b></label>
			            <input type="text" class="form-control" id="phone" value="{{old('phone')}}" name="phone" placeholder="请输入您的手机号" ><span class="span1" id="span2"></span>
						  <div class="verification">
							  <label for="code"><i class="am-icon-code-fork"></i></label>
							  <input type="tel" class="form-control" name="phone_code" id="code" value="{{old('phone_code')}}" placeholder="请输入验证码">
							  <a class="btn btn-default" href="javascript:void(0);" >
								  <span id="dyMobileButton">点击获取</span></a>
						  </div>
						  @if(session('error'))
							  <font style="color:red">{{ session('error') }}</font>
						  @endif
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label"><span style="color:red">*</span><b>密码</b></label>
			            <input type="password" class="form-control" id="password" name="password" placeholder="密码"><span class="span3" id="span3"></span>
			          </div>
					</div>
					<div class="form-group">
			          <div class="col-md-6">
						  <label for="password" class="control-label"><span style="color:red">*</span><b>确认密码</b></label>
			            <input type="password" class="form-control" id="password_confirm" name="repassword" placeholder="确认密码"><span class="span4" id="span4"></span>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="立即注册" class="btn btn-info">
			            <a href="{{url('/home/login/login')}}" style="margin-left:100px">已有账号,直接登录</a>
			          </div>
			        </div>
				</div>
		      </form>
		</div>
	</div>
	<script type="text/javascript">
		var s1 = s2 = false;
        //手机号
        var tel = $('input[name="phone"]');
        //手机号聚焦
        tel.focus(function()
        {
            $('.span1').text('请输入11位手机号').css('color','#ccc');
        });

        //失去焦点
        tel.blur(function()
        {
            //正则验证
            var preg = /^1[3|4|5|7|8]\d{9}$/;
            //判断验证结果
            if(preg.test(tel.val())){
                //发送ajax验证手机号
                $.post("{{url('home/zhuce/tel')}}/"+tel.val(),{'_token':"{{csrf_token()}}"},function(msg)
                {
                    //判断结果
                    if(msg == 1){
                        $('#span2').text('手机号已存在' ).css('color','red');
                        s1 = false;
                    }else{
                        $('#span2').text('恭喜可用').css('color','green');
                        s1 = true;
                    }
                });
            }else{
                $('.span1').text('手机号为空或格式不正确').css('color','red');
                s1 = false;
            }
        });

        //获取密码
        var upwd = $('input[name="password"]');
        //聚焦
        upwd.focus(function()
        {
            $('.span3').text('请输入6-18位密码').css('color','#ccc');
        });
        //失去焦点
        upwd.blur(function()
        {
            var preg = /^[0-9a-zA-Z\W_]{6,18}$/;
            if(preg.test(upwd.val())){
                $('.span3').text('').css('color','green');
                s2 = true;
            }else{
                $('.span3').text('密码格式不正确').css('color','red');
                s2 = false;
            }
        });

        //获取确认密码
        var reupwd = $('input[name="repassword"]');
        //聚焦
        reupwd.focus(function()
        {
            $('.span4').text('请再输入一遍').css('color','#ccc');
        });
        //失焦
        reupwd.blur(function()
        {
            if(upwd.val() == reupwd.val()){
                $('.span4').text('').css('color','green');
                s3 = true;
            }else{
                $('.span4').text('密码不一致').css('color','red');
                s3 = false;
            }
        });

        //获取验证码
        $('#dyMobileButton').click(function()
        {
            var phone = $('#phone').val()
            // 发送ajax 注册手机号
            $.get('/home/zhuce/phone',{phone:phone},function(msg)
            {
                if(msg.code == 2){
                    alert(msg.msg);
                    return;
                }else{
                    alert(msg.msg);
                    return;
                }
            },'json');
        });

        //提交form
        $('form').submit(function()
        {
            if(s1 && s2 && s3){
                return true;
            }
            return false;
        });

	</script>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>