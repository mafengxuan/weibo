@extends('admin.layout.blank')
@section('body')
<div class="page-container">
    <form class="form form-horizontal" id="art_form" action="{{url('admin/ad')}}" method="post">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">广告名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="ad_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>广告位：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="pid" class="select">
                    @foreach($adPosition as $k=>$v)
					<option value="{{$v->pid}}">{{$v->p_name}}</option>
					@endforeach
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">广告链接：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="ad_url">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">广告简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="ad_brief" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">上传图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="ad_img" id="ad_img" style="width:200px;" value="">
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
                                $('#ad_img').val(data);

                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                alert("上传失败，请检查网络后重试");
                            }
                        });
                    }

                </script>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
            <td>
                <img src="" alt="" name="pic" id="pic" style="width:100px;display:none;" >
            </td>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">购买天数：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="1" placeholder="" id="number" name="num">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">总价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="price" name="price" style="border:none; width:100px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>发布日期：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="ad_ctime" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>结束日期：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="ad_etime" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'datemin\')}' })" id="datemax" class="input-text Wdate">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">下单人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="number" name="auditor">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input type="submit" class="btn btn-primary radius" value="提交">
                <input type="button" class="btn btn-default" onclick="history.go(-2)" value="返回">
            </div>
        </div>

    </form>
</div>

@endsection