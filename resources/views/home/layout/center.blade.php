<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>个人资料</title>

    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/admin/bootstrap/css/bootstrapValidator.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/home/user/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/amazeui.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('/home/user/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrapValidator.js')}}" type="text/javascript"></script>
    {{--<script src="{{asset('/home/js/checkaudit.js}}" type="text/javascript"></script>--}}

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
                        <img class="am-circle am-img-thumbnail" id="pic" src="{{$face}}" alt="" />
                    </div>
                    <p class="am-form-help">头像</p>

                    <div class="info-m">
                        <div><b>用户名：<i>{{session('user_home')->phone}}</i></b></div>
                        <div class="u-level">
                                <span class="rank r2">
                                     <s class="vip1"></s>@if(session('user_home')->type == '1')
                                        普通用户
                                    @elseif(session('user_home')->type == '2')
                                        公司认证用户
                                    @elseif(session('user_home')->type == '3')
                                        商业认证用户
                                    @elseif(session('user_home')->type == '4')
                                        大V认证用户
                                    @endif
                                </span>
                        </div>
                        <style>
                            #jiao{width:30px;height:30px}
                        </style>


                        @if(session('user_home')->type == '1')

                        @elseif(session('user_home')->type == '2')
                            <img src="/uploads/v3.png" id="jiao"/>
                        @elseif(session('user_home')->type == '3')
                            <img src="/uploads/v2.png" id="jiao"/>
                        @elseif(session('user_home')->type == '4')
                            <img src="/uploads/v1.png" id="jiao"/>
                        @endif


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
                <b>个人中心</b>
            </li>
            <li class="person">
                <a href="{{url('home/index')}}">首页</a>
                <ul>
                    <li @if($_SERVER['REQUEST_URI']=='/home/info') class="active" @endif> <a href="{{url('home/info')}}">个人信息</a></li>
                    <li @if($_SERVER['REQUEST_URI']=='/home/repass') class="active" @endif> <a href="{{url('home/repass')}}">修改密码</a></li>
                    <li @if($_SERVER['REQUEST_URI']=='/home/email') class="active" @endif> <a href="{{url('home/email')}}">激活邮箱</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="javascript:;">我的交易</a>
                <ul>
                    <li @if($_SERVER['REQUEST_URI']=='/home/ad') class="active" @endif><a href="{{url('home/ad')}}">广告中心</a></li>

                </ul>
            </li>

            <li class="person">
                <a href="javascript:;">我的认证</a>
                <ul>
                    <li @if($_SERVER['REQUEST_URI']=='/home/myaudit') class="active" @endif> <a href="{{url('home/myaudit')}}">我提交的申请</a></li>
                    <li @if($_SERVER['REQUEST_URI']=='/home/company') class="active" @endif> <a href="javascript:;" id="company" onclick="check_audit('company')">公司用户认证</a></li>
                    <li @if($_SERVER['REQUEST_URI']=='/home/commerce') class="active" @endif> <a href="javascript:;" id="commerce" onclick="check_audit('commerce')">商业用户认证</a></li>
                    <li @if($_SERVER['REQUEST_URI']=='/home/bigv') class="active" @endif> <a href="javascript:;" id="bigv" onclick="check_audit('bigv')">大V用户认证</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>

</body>
</html>
@section('js')

@show

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
