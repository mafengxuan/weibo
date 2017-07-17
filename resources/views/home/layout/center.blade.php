<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>

    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/admin/bootstrap/css/bootstrapValidator.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/home/user/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/amazeui.js')}}" type="text/javascript"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrapValidator.js')}}" type="text/javascript"></script>
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
@section('show')
@show

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
                    <li><a href="{{url('home/ad')}}">广告中心</a></li>
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
                    <li> <a href="javascript:;" id="company" onclick="check_company('company')">公司用户认证</a></li>
                    <li> <a href="javascript:;" id="commerce" onclick="check_commerce('commerce')">商业用户认证</a></li>
                    <li> <a href="javascript:;" id="bigv" onclick="check_bigv('bigv')">大V用户认证</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
@section('js')
    @show
</body>
</html>
{{--<script>--}}
    {{--function check_company(str)--}}
    {{--{--}}
        {{--var type = str;--}}
        {{--$.post("{{url('home/auditcheck')}}",{'_token':"{{csrf_token()}}"},function(data){--}}
            {{--if(data.status==0){--}}
                {{--location.href="{{url('home')}}/"+type;--}}
            {{--}else{--}}
                {{--alert('有待审核或已通过审核认证，不能再次申请');--}}
            {{--}--}}
        {{--})--}}
    {{--}--}}

    {{--function check_commerce()--}}
    {{--{--}}

    {{--}--}}
    {{--function check_bigv()--}}
    {{--{--}}

    {{--}--}}
{{--</script>--}}
