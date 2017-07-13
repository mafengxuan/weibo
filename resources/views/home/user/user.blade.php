<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>

    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/home/user/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/home/user/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('/home/user/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script src="{{asset('/home/user/AmazeUI-2.4.2/assets/js/amazeui.js')}}" type="text/javascript"></script>

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
                    <td>
                        <input type="text" name="art_thumb" id="art_thumb" style="width:300px;">
                        <input type="file" name="file_upload" id="file_upload" value="">
                        <script type="text/javascript">
                            $(function () {
                                $("#file_upload").change(function () {

                                    uploadImage();
                                });
                            });

                            function uploadImage() {
//                            判断是否有选择上传文件
                                var imgPath = $("#file_upload").val();
                                if (imgPath == "") {
                                    alert("请选择上传图片！");
                                    return;
                                }
                                //判断上传文件的后缀名
                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                if (strExtension != 'jpg' && strExtension != 'gif'
                                    && strExtension != 'png' && strExtension != 'bmp') {
                                    alert("请选择图片文件");
                                    return;
                                }

                                var formData = new FormData($('#art_form')[0]);

                                $.ajax({
                                    type: "POST",
                                    url: "/admin/upload",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
//                                    console.log(data);
//                                    alert("上传成功");
                                        $('#pic').attr('src','/'+data);
                                        $('#pic').show();
                                        $('#art_thumb').val(data);

                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }

                        </script>

                    </td>

                    <div class="info-m">
                        <div><b>用户名：<i>{{session('user_home')->phone}}</i></b></div>
                        <div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">普通用户</a>
						            </span>
                        </div>
                    </div>
                </div>
                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal" action="{{url('home/doedit')}}" method="post">
                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">真实姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="realname" value="{{$data['realname']}}" placeholder="真实姓名" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" value="{{$data['qq']}}" placeholder="qq" style="width:250px;">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" onfocus="WdatePicker()" id="datemin" value="{{$data['birth']}}" name="birth" class="input-text Wdate" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" value="{{$data['address']}}" placeholder="地址" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">性别</label>
                            <div class="am-form-content sex">
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="1" @if($data['sex'] == 1) checked @endif data-am-ucheck> 男
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="2" @if($data['sex'] == 2) checked @endif data-am-ucheck> 女
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="3" @if($data['sex'] == 3) checked @endif data-am-ucheck> 保密
                                </label>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">年龄</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="age" value="{{$data['age']}}" placeholder="年龄" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">简介</label>
                            <div class="am-form-content">
                                <textarea name="introduction"  id=""  cols="30" rows="3">{{$data['introduction']}}</textarea>
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
                            {{--<div class="am-btn am-btn-danger" type="submit">保存修改</div>--}}
                            <input type="submit" class="am-btn am-btn-danger" value="保存修改">
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
                    <li class="active"> <a href="{{url('home/info')}}">个人信息</a></li>
                    <li> <a href="{{url('home/repass')}}">修改密码</a></li>
                    <li> <a href="address.html">激活邮箱</a></li>
                </ul>
            </li>
             <li class="person">
                <a href="#">我的交易</a>
                <ul>
                    <li><a href="{{url('home/ad')}}">广告中心</a></li>
                    {{--<li> <a href="change.html">退款售后</a></li>--}}
                </ul>
            </li>
             {{--<li class="person">--}}
                {{--<a href="#">我的资产</a>--}}
                {{--<ul>--}}
                    {{--<li> <a href="coupon.html">优惠券 </a></li>--}}
                    {{--<li> <a href="bonus.html">红包</a></li>--}}
                    {{--<li> <a href="bill.html">账单明细</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

             {{--<li class="person">--}}
                {{--<a href="#">我的小窝</a>--}}
                {{--<ul>--}}
                    {{--<li> <a href="collection.html">收藏</a></li>--}}
                    {{--<li> <a href="foot.html">足迹</a></li>--}}
                    {{--<li> <a href="comment.html">评价</a></li>--}}
                    {{--<li> <a href="news.html">消息</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>

    </aside>
</div>

</body>

</html>