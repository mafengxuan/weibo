<!DOCTYPE html>
<head>
	<title>登录</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="/home/zhuce/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/home/zhuce/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/home/zhuce/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="/home/zhuce/css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">登录</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="{{url('/home/login/dologin')}}" method="post">
				@if (count($errors) > 0)
					<div class="mark" style="color:red">
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
				{{csrf_field()}}
		        <div class="form-group">
		          <div class="col-xs-8">
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" name="phone" value="{{old('phone')}}" placeholder="用户名">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-8">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" placeholder="密码">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
						<a href="{{url('home/phone/phone')}}" style="color:deepskyblue;margin-right:30px;">忘记密码</a>
						<input type="submit" value="登录" class="btn btn-info" style="margin-right: 45px">
						<a href="{{url('home/zhuce/add')}}" style="color:red">立即注册</a>
		          	</div>
		          </div>
		        </div>
		      </form>

		</div>
	</div>
</body>
</html>