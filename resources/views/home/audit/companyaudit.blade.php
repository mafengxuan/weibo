@extends('home.layout.center')
@section('show')

    <div class="result_wrap">
        <form action="{{url('home/company')}}" method="post" id="art_form" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>公司名称：</th>
                    <td>
                        <input type="text" name="company_name">
                    </td>
                </tr>
                <tr>
                    <th>认证费用：</th>
                    <td>
                        <input type="radio" name="price">999
                    </td>
                </tr>
                <tr>
                    <th>公司营业执照：</th>
                    <td>
                        <input type="text" name="company_img" id="company_img">
                        <input type="file" name="file_upload" id="file_upload" value="">
                        <p><img src="" alt="" id="img1" style="width:100px" hidden></p>


                        <script type="text/javascript">
                            $(function () {
                                $("#file_upload").change(function () {
                                    $('img1').show();
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
                                    url: "/uploads",
                                    data: formData,
                                    async: true,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
                                        $('#img1').attr('src','/'+data);
                                        $('#img1').show();
                                        $('#art_thumb').val(data);


                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                    }
                                });
                            }

                        </script>

                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection