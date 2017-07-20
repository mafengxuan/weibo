<!DOCTYPE html>
<head>
    <title>修改密码</title>
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
        <h1 class="margin-bottom-15">修改密码</h1>
        <form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="{{url('/home/phone/dopwd')}}" method="post">
            @if (count($errors) > 0)
                <div class="mark" style="color:red">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $errors)
                                <li class="xxoo">{{ $errors }}</li>
                            @endforeach
                        @else
                            <li class="xxoo">{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-md-8">
                    <div class="control-wrapper">
                        <label for="password" class="control-label fa-label"><i class="fa fa-lock                                 fa-medium"></i>
                        </label>
                        <input type="password" class="form-control" id="password" value"" name="password"                         placeholder="新密码">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <div class="control-wrapper">
                        <label for="password" class="control-label fa-label"><i class="fa fa-lock                                fa-medium"></i>
                        </label>
                        <input type="password" class="form-control" id="password" value=""                                       name="password_c" placeholder="确认密码">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <input type="submit" value="提交" class="btn btn-info" style="margin-right: 70px">
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>