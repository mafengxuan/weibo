@extends('admin.layout.blank')
@section('body')
<div class="page-container">
    <form class="form form-horizontal" id="art_form" action="{{url('admin/ad')}}" method="post">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$session['username']}}" name="username" style="width:500px;"><span style=" text-decoration: none" class="btn btn-link"></span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>广告名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="ad_name" style="width:500px;"><span style=" text-decoration: none" class="btn btn-link"></span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>广告位：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box"  style="width:500px;">
				<select name="pid" class="select">
                    @foreach($adPosition as $k=>$v)
					<option value="{{$v->pid}}">{{$v->p_name}}</option>
					@endforeach
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">单价/天：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" disabled="disabled" value="10" placeholder="" id="uprice" name="" style="border:none; width:30px;">元
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">广告链接：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="ad_url" style="width:500px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">广告简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="ad_brief" cols="" rows="" class="textarea" style="width:500px;"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
                <p class="textarea-numberbar"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">上传图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
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
                            url: "/admin/upload",
                            data: formData,
                            async: true,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
//                                    console.log(data);
//                                    alert("上传成功");
                                {{--$('#pic').attr('src','{{env('ALIOSS_SERVER')}}'+'/'+data);--}}
                                $('#pic').attr('src',data);
                                $('#pic').show();
                                $('#ad_img').val(data);
//                                <img src="http://oss-cn-beijing.aliyuncs.com/uploads/201707062200023677.jpg" width="100">
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

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
            <td>
                <img src="" alt="" name="pic" id="pic" style="width:100px;display:none;" >
            </td>
        </div>
        <div class="row cl ">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>购买天数：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="1" placeholder="" id="number" name="ad_num" style="width:500px;"><span style=" text-decoration: none" class="btn btn-link"></span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>日期范围：</label>&nbsp;&nbsp;&nbsp;
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',minDate:'%y-%M-%d' })" id="logmin" name="ad_ctime" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker()" id="logmax" name="ad_etime" class="input-text Wdate" style="width:120px;">
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>总价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="10" readonly placeholder="" id="price" name="ad_price" style="border:none; width:500px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>下单人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" readonly value="{{$session['username']}}" placeholder="" id="" name="auditor" style="width:500px;">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input type="submit" class="btn btn-primary radius" class="submit" value="提交">
                <input type="button" class="btn btn-default" onclick="history.go(-1)" value="返回">
            </div>
        </div>

    </form>
</div>

@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>
    <script>
        $(function(){

            // 购买天数 失去焦点事件
            $('#number').blur(function(){
                var uPrice =  $('#uprice').val();
                var numb = $('#number').val();
                $('#price').val(uPrice * numb);
            });

            var ok1 = false;
            var ok2 = false;
            var ok3 = false;
            // 用户名称失去焦点事件
            $('input[name="username"]').blur(function(){
                if($('input[name="username"]').val()!=''){
                    $(this).next().text('');
                }
            });
            // 广告名称失去焦点事件
            $('input[name="ad_name"]').blur(function(){
                if($('input[name="ad_name"]').val()!=''){
                    $(this).next().text('');
                }
            });
            // 购买天数失去焦点事件
            $('input[name="ad_num"]').blur(function(){
                if($('input[name="ad_num"]').val()!=''){
                    $(this).next().text('');
                }
            });
            // 表单提交事件
            $('form').submit(function(){
                if($('input[name="username"]').val()!=''){
                    ok1 = true;
                }else{
                    $('input[name="username"]').next().text('用户名称不能为空');
                    ok1 = false;
                }
                if($('input[name="ad_name"]').val()!=''){
                    ok2 = true;
                }else{
                    $('input[name="ad_name"]').next().text('广告名称不能为空');
                    ok2 = false;
                }
                if($('input[name="ad_num"]').val()!=''){
                    ok3 = true;
                }else{
                    $('input[name="ad_num"]').next().text('版位唯一标识不能为空');
                    ok3 = false;
                }

                if(ok1 && ok2 && ok3){
                    return true;
                }else{
                    layer.msg('信息未填完整',{icon:2});
                    return false;
                }
            })
        })
    </script>

@endsection

@endsection