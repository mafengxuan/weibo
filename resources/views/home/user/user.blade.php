<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>

    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/home/user/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/amazeui.js')}}" type="text/javascript"></script>
    {{--<script src="{{asset('/home/js/checkaudit.js')}}" type="text/javascript"></script>--}}
</head>

<body>

<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd"></div>
                    </div>
                </ul>
                <ul class="message-r"></ul>
            </div>
            <!--悬浮搜索框-->
            <div class="nav white"></div>
            <div class="clear"></div>
        </div>
        </div>
    </article>
</header>
<div class="nav-table">

</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-info">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong></div>
                </div>
                <hr/>
                <!--头像 -->
                <div class="user-infoPic">
                    <div class="filePic">
                        <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                        <img class="am-circle am-img-thumbnail" src="{{asset('/home/user/images/getAvatar.do.jpg')}}" alt="" />
                    </div>
                    <p class="am-form-help">头像</p>
                    <div class="info-m">
                        <div><b>用户名：<i>{{session('user_home')->phone}}</i></b></div>
                        <div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">普通用户</a>
						            </span>
                        </div>
                        {{--<div class="u-safety">--}}
                            {{--<a href="safety.html">--}}
                                {{--账户安全--}}
                                {{--<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">真实姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="realname" placeholder="nickname">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="birth" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-form-label">性别</label>
                            <div class="am-form-content">
                                <input id="user-phone" name="sex" placeholder="telephonenumber" type="input">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">年龄</label>
                            <div class="am-form-content">
                                <input id="user-email" placeholder="Email" name="age" type="input">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">简介</label>
                            <div class="am-form-content">
                                <input id="user-email" placeholder="Email" name="introduction" type="input">
                            </div>
                        </div>
                        <div class="am-form-group safety">
                            <label for="user-safety" class="am-form-label">账号安全</label>
                            <div class="am-form-content safety">
                                <a href="safety.html">

                                    <span class="am-icon-angle-right"></span>

                                </a>

                            </div>
                        </div>
                        <div class="info-btn">
                            <div class="am-btn am-btn-danger">保存修改</div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
        <!--底部-->
        <div class="footer">

        </div>
    </div>

    <aside class="menu">
        <ul>
            <li class="person">
                <a href="#">个人中心</a>
            </li>
            <li class="person">
                <a href="#">个人资料</a>
                <ul>
                    <li class="active"> <a href="#">个人信息</a></li>
                    <li> <a href="safety.html">安全设置</a></li>
                    <li> <a href="address.html">收货地址</a></li>
                </ul>
            </li>
             <li class="person">
                <a href="#">我的交易</a>
                <ul>
                    <li><a href="order.html">订单管理</a></li>
                    <li> <a href="change.html">退款售后</a></li>
                </ul>
            </li>
             <li class="person">
                <a href="#">我的资产</a>
                <ul>
                    <li> <a href="coupon.html">优惠券 </a></li>
                    <li> <a href="bonus.html">红包</a></li>
                    <li> <a href="bill.html">账单明细</a></li>
                </ul>
            </li>

             <li class="person">
                 <ul>
                     <li> <a href="{{url('home/myaudit')}}">我提交的申请</a></li>
                     <li> <a href="javascript:;" id="company" onclick="check_audit('company')">公司用户认证</a></li>
                     <li> <a href="javascript:;" id="commerce" onclick="check_audit('commerce')">商业用户认证</a></li>
                     <li> <a href="javascript:;" id="bigv" onclick="check_audit('bigv')">大V用户认证</a></li>
                 </ul>
            </li>

        </ul>

    </aside>
</div>

</body>
<script>
    function check_audit(str)
    {
        var type = str;
        $.post("{{url('home/auditcheck')}}",{'_token':"{{csrf_token()}}"},function(data){
            if(data.status==0){
                location.href="{{url('home')}}/"+type;
            }else{
                alert('有待审核或已通过审核认证，不能再次申请');
            }
        })
    }
</script>
</html>
{{--<script src="/home/js/checkaudit.js"></script>--}}