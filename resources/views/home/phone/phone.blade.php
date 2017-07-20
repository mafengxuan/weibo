<!DOCTYPE html>
<head>
    <title>找回密码</title>
    <style type="text/css">
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
<h1 class="margin-bottom-15">请验证您的手机号</h1>
<div class="container">
    <div class="col-md-12" id="doc-my-tabs">
        <form class="form-horizontal templatemo-create-account templatemo-container" action="{{url('/home/phone/insert')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-inner">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="username" class="control-label"><span style="color:red">*</span><b>手机号                          </b></label>
                        <input type="text" class="form-control" id="phone" value="{{old('phone')}}"                                name="phone" placeholder="请输入您的手机号" ><span class="span1"                                        id="span2"></span>
                        <div class="verification">
                            <label for="code"><i class="am-icon-code-fork"></i></label>
                            <input type="tel" name="phone_code" id="code" value="{{old('phone_code')}}"                             placeholder="请输入验证码">
                            <a class="btn btn-default" href="javascript:void(0);" >
                                <span id="dyMobileButton">点击获取</span></a>
                        </div>
                        @if(session('error'))
                            <font style="color:red">{{ session('error') }}</font>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
            <input type="submit" class="btn                                                         btn-info"style="margin-left:100px" value="下一步">
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
            $.post("{{url('home/phone/tel')}}/"+tel.val(),{'_token':"{{csrf_token()}}"},function(msg)
            {
                //判断结果
                if(msg == 2){
                    $('#span2').text('手机号不存在' ).css('color','red');
                    s1 = false;
                }else{
                    $('#span2').text('输入正确').css('color','green');
                    s1 = true;
                }
            });
        }else{
            $('.span1').text('手机号为空或格式不正确').css('color','red');
            s1 = false;
        }
    });

    //获取验证码
    $('#dyMobileButton').click(function()
    {
        var phone = $('#phone').val()
        // 发送ajax 注册手机号
        $.get('/home/phone/code',{phone:phone},function(msg)
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
        if(s1){
            return true;
        }
        return false;
    });

</script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>