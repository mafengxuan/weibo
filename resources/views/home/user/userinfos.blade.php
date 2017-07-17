@extends('home.layout.center')
@section('show')

                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal" action="{{url('home/doindex')}}" method="post">
                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">昵称</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="nickname" value="{{$user3['nickname']}}" disabled placeholder="昵称" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">上传头像：</label>
                            <div class="am-form-content">
                                <input type="text" name="face" id="face" disabled style="width:250px;" value="{{$user3['face']}}">
                                <input type="file" name="file_upload" disabled id="file_upload" value="">
                                <p><img src="/{{$face}}" class="am-circle am-img-thumbnail" alt="" id="pic" style="width:100px" hidden></p>
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
                                            url: "/home/upload",
                                            data: formData,
                                            async: true,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(data) {
                                                $('#pic').attr('src','/'+data);
                                                $('#pic').show();
                                                $('#face').val(data);
                                            },
                                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                alert("上传失败，请检查网络后重试");
                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">真实姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="realname" value="{{$user['realname']}}" disabled placeholder="真实姓名" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">邮箱</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="email" value="{{$email}}" disabled placeholder="邮箱" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" value="{{$user['qq']}}" placeholder="qq" disabled style="width:250px;">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" onfocus="WdatePicker()" id="datemin" value="{{$user['birth']}}" name="birth" disabled class="input-text Wdate" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" value="{{$user['address']}}" placeholder="地址" disabled style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">性别</label>
                            <div class="am-form-content sex">
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="1" @if($user['sex'] == 1) checked @endif disabled data-am-ucheck> 男
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="2" @if($user['sex'] == 2) checked @endif disabled data-am-ucheck> 女
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="3" @if($user['sex'] == 3) checked @endif disabled data-am-ucheck> 保密
                                </label>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">年龄</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="age" value="{{$user['age']}}" placeholder="年龄" disabled style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">简介</label>
                            <div class="am-form-content">
                                <textarea name="introduction"  disabled id="" cols="30" rows="3">{{$user['introduction']}}</textarea>
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
                            <input type="button" class="am-btn am-btn-primary" onclick="history.go(-1)" value="返回">
                            <a href="{{url('home/edit')}}" class="am-btn am-btn-warning">编辑个人资料</a>
                        </div>
                    </form>
                </div>

   @endsection