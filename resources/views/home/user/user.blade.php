@extends('home.layout.center')
@section('show')
                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal" action="{{url('home/doedit')}}" method="post" id="art_form">
                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">昵称</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="nickname" value="{{$user2['nickname']}}"  placeholder="" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">上传头像：</label>
                            <div class="am-form-content">
                                <input type="text" name="face" id="face" style="width:250px;" value="{{$face}}">
                                <input type="file" name="file_upload" id="file_upload" value="">
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
                                            url: '/home/upload',
                                            data: formData,
                                            async: true,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(data) {

                                                $('#pic').attr('src',data);
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
                                <input type="text" id="user-name2" name="realname" value="{{$data['realname']}}" placeholder="" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">邮箱</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="email" value="{{$email}}"  placeholder="" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" value="{{$data['qq']}}" placeholder="" style="width:250px;">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" onfocus="WdatePicker()" id="datemin" value="{{date('Y年m月d日',$data['birth'])}}" name="birth" class="input-text Wdate" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" value="{{$data['address']}}" placeholder="" style="width:250px;">
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
                                <input type="text" id="user-name2" name="age" value="{{$data['age']}}" placeholder="" style="width:250px;">
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
                            <input type="button" class="am-btn am-btn-primary" onclick="history.go(-1)" value="返回">
                            <input type="submit" class="am-btn am-btn-warning" value="保存修改">
                        </div>
                    </form>
                </div>

@endsection