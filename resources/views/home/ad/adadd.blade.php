@extends('home.layout.center')
@section('show')
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>
    <div class="info-main">
        <form class="am-form am-form-horizontal form-horizontal" action="{{url('home/adadd')}}" method="post" id="art_form" >
            {{csrf_field()}}
            <div class="am-form-group form-group">
                <label for="user-name2" class="am-form-label">广告名称</label>
                <div class="am-form-content">
                    <input type="text" id="ad_name" name="ad_name" value="" style="width:300px;">
                </div>
            </div>
            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">广告位</label>
                <div class="am-form-content">
                    <span class="select-box">
				    <select name="pid" class="select"  style="width:300px;">
                         @foreach($adPosition as $k=>$v)
                             <option value="{{$v->pid}}">{{$v->p_name}}</option>
                         @endforeach
				    </select>
				    </span>
                </div>
            </div>

            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">单价/元：</label>
                <div class="am-form-content">
                    <input type="text" id="uprice" disabled="disabled" value="10" name="" class="input-text Wdate" style="border:none; width:30px;">
                </div>
            </div>
            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">广告链接：</label>
                <div class="am-form-content">
                    <input type="text" id="ad_url" name="ad_url" value="" placeholder="" style="width:300px;">
                </div>
            </div>

            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">广告简介：</label>
                <div class="am-form-content">
                    <textarea name="ad_brief"  id="ad_brief"  cols="30" rows="3" style="width:300px; resize:none"></textarea>
                </div>
            </div>
            <div class="am-form-group form-group">
                <label class="am-form-label">上传图片：</label>
                <div class="am-form-content">
                    <input type="text" name="ad_img" id="ad_img" style="width:300px;" value="">
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
                                url: "/home/upload",
                                data: formData,
                                async: true,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    $('#picc').attr('src',data);
                                    $('#picc').show();
                                    $('#ad_img').val(data);
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    alert("上传失败，请检查网络后重试");
                                }
                            });
                        }
                        // 下拉框选中事件
                        $(".select").bind('change',function(){
                            if($(this).val() == 1){
                                $('#uprice').val('10');
                            }else if($(this).val() == 2){
                                $('#uprice').val('9');
                            }else if($(this).val() == 3){
                                $('#uprice').val('8');
                            }else if($(this).val() == 4){
                                $('#uprice').val('8');
                            }else if($(this).val() == 5){
                                $('#uprice').val('8');
                            }
                        });

                        // 下拉框失去焦点事件
                        $('.select').blur(function(){
                            var uPrice =  $('#uprice').val();
                            var numb = $('#number').val();
                            $('#price').val(uPrice * numb);
                        });

                    </script>
                </div>
            </div>
            <div class="am-form-group form-group">
                <label for="user-safety" class="am-form-label">缩略图：</label>
                <div class="am-form-content safety">
                    <img src="" alt="" name="picc" id="picc" style="width:100px;display:none;" >
                </div>
            </div>
            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">购买天数：</label>
                <div class="am-form-content">
                    <input type="text" id="number" name="ad_num" value="1" placeholder="" style="width:300px;">
                </div>
            </div>
            <script>
                // 购买天数 失去焦点事件
                $('#number').blur(function(){
                    var uPrice =  $('#uprice').val();
                    var numb = $('#number').val();
                    $('#price').val(uPrice * numb);
                });
            </script>
            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">日期范围：</label>
                <div class="am-form-content">
                    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',minDate:'%y-%M-%d' })" id="logmin" name="ad_ctime" class="input-text Wdate" style="width:120px;">

                    <input type="text" onfocus="WdatePicker()" id="logmax" name="ad_etime" class="input-text Wdate" style="width:120px;float:right;margin-top:-33px;margin-right:360px;">
                </div>
            </div>
            <div class="am-form-group form-group">
                <label for="user-name" class="am-form-label">总价：</label>
                <div class="am-form-content">
                    <input type="text" id="price" readonly name="ad_price" value="10" placeholder="" style="width:300px;">
                </div>
            </div>
            <div class="info-btn">
                <input type="submit" class="btn btn-info" value="提交">
            </div>
        </form>

    </div>

@endsection

@section('js')
    <script>
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
                fields: {
//                广告名
                    ad_name: {
                        message: '广告名非法',
                        validators: {
//                        非空
                            notEmpty: {
                                message: '广告名不能为空'
                            },
////                        限制字符串长度
                            stringLength: {
                                min:1,
                                max: 20,
                                message: '广告名长度不能超过20位'
                            }
                        }
                    },

//                广告链接
                    ad_url: {
                        message: '广告链接非法',
                        validators: {
                            notEmpty: {
                                message: '广告链接不能为空'
                            }
                        }
                    },

                    //  广告简介
                    ad_brief: {
                        message: '广告简介非法',
                        validators: {
                            notEmpty: {
                                message: '广告简介不能为空'
                            },
//                        限制字符串长度
                            stringLength: {
                                min:1,
                                max: 200,
                                message: '广告简介不能多于200字'
                            }
                        }
                    },

//                购买天数
                    ad_num: {
                        validators: {
                            notEmpty: {
                                message: '购买天数不能为空'
                            }
                        }
                    }
                }
            })
        })
    </script>
@endsection