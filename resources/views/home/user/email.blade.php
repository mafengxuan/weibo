@extends('home.layout.center')
@section('show')
    <!--邮箱激活 -->
    <style>
        .xo{
            color: red;
        }
    </style>

    <div class="info-main">
        <form class="am-form am-form-horizontal" action="{{url('home/doemail')}}" method="post">
            {{csrf_field()}}
            <div class="am-form-group">
                <label for="user-name2" class="am-form-label">邮箱</label>

                <div class="am-form-content">
                    <input type="text" id="user-name2"  name="email" value=""  placeholder="请输入您的邮箱" style="width:250px;">@if(session('errors'))
                            <span class="xo">{{session('errors')}}</span>
                        @else
                            <span>{{session('errors')}}</span>
                        @endif

                </div>
            </div>
            <script>
                var s1 = false;
                //邮箱
                var email = $('input[name="email"]');
                //用户聚焦
                email.focus(function(){
                     $('span:eq(1)').text('请输入正确的邮箱格式').css('color','#ccc');
                 });

                //失去焦点
                email.blur(function(){
                    //正则验证
                    var preg = /[0-9a-zA-Z_]+@[0-9a-zA-Z]+(\.[a-z]+)+/;
                    //判断验证结果
                    if(preg.test(email.val())){
                        $('span:eq(1)').text('' ).css('color','green');
                        s1 = true;
                    }else{
                        $('span:eq(1)').text('邮箱为空或格式不正确').css('color','red');
                        s1 = false;
                    }
                });

                $('form').submit(function()
                {
                    if(s1){
                     return true;
                }
                     return false;
                });
            </script>
            <div class="am-form-group safety">
                <label for="user-safety" class="am-form-label">账号安全</label>
                <div class="am-form-content safety">
                    <a href="safety.html">
                        <span class="am-icon-angle-right"></span>
                    </a>
                </div>
            </div>
            <div class="info-btn">
                <input type="button" class="am-btn am-btn-primary" onclick="history.go(-1)" value="返回">
                <input type="submit" class="am-btn am-btn-warning"  value="激活">
            </div>
        </form>
    </div>

@endsection