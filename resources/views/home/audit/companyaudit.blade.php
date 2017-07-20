@extends('home.layout.center')
@section('show')

    <div class="result_wrap">
        <form action="{{url('home/company')}}" method="post" id="art_form" enctype="multipart/form-data">
            {{csrf_field()}}
                    <td>
                        <div class="form-group">
                            <label for="company_name">公司名称</label>
                            <input type="text" style="width:400px" class="form-control" id="company_name" name="company_name" placeholder="公司名称"><button type="button" class="btn btn-info" onclick="checkname()">验证是否注册</button>
                        </div>
                        <div class="form-group">
                            <label for="company_img">公司营业执照</label>
                            <input type="text" style="width:400px" name="company_img" id="company_img" class="form-control">
                            <input type="file" name="file_upload" id="file_upload" value="">
                            <img src="" alt="" id="pic1" name="pic" style="width:100px; display:none;">
                        </div>

                        <div class="form-group">
                            <label >认证费用</label>
                            <label class="radio-inline">
                                <input type="radio" name="price" id="inlineRadio1" value="998" checked> 998
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="price" id="inlineRadio2" value="1999"> 1999
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="price" id="inlineRadio3" value="2999"> 2999
                            </label>
                        </div>




                        <script type="text/javascript">
                            $(function () {
                                $("#file_upload").change(function () {
                                    $('#pic1').show();
                                    uploadImage();
                                });
                            });
                            function uploadImage() {
                                //判断是否有选择上传文件
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
                                        $('#pic1').attr('src','/'+data);
                                        $('#pic1').show();
                                        $('#company_img').val(data);


                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }

                        </script>
                        <button class="btn btn-success" onclick="doaudit()">提交</button>

        </form>
    </div>
    <script>
        //ajax提交用户认证信息
        function doaudit()
        {
            $.post("{{url('home/company/doaudit')}}",$('form').serialize(),function(data){
                if(data.status=='0'){
                    location.href="{{url('home/myaudit')}}";
                }else{
                    alert('信息提交失败');
                }
            });
        }
    </script>
    <script>
        //ajax判断用户提交名称是否在User_companys表中存在
        function checkname()
        {
            $.post("{{url('home/company/checkname')}}",$('form').serialize(),function(data){
                if(data.status=='0'){
                    alert('未注册可用');
                }else{
                    alert('名称已注册');
                }
        });
        }

    </script>
    <script>
        //bootstrapValidator表单验证
        $(function () {
            <!--数据验证-->
            $("#art_form").bootstrapValidator({
                message:'This value is not valid',
//            定义未通过验证的状态图标
                feedbackIcons: {/*输入框不同状态，显示图片的样式*/
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
//            字段验证
                fields:{
//                用户名
                    company_name:{
                        message:'公司名称非法',
                        validators:{
//                        非空
                            notEmpty:{
                                message:'公司名称不能为空'
                            },
//                        限制字符串长度
                            stringLength:{
                                min:2,
                                max:20,
                                message:'公司名称长度必须位于3到20之间'
                            }
                        }
                    }
                }
            })

        })
    </script>
@endsection