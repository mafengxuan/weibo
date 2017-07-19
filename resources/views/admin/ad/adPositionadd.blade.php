@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="art_form" action="{{url('admin/adPosition')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>版位名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="p_name" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">广告位唯一标识：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="ad_tag" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">收费标准：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="standard" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="2" placeholder="" id="number" name=status style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <input type="submit" class="btn btn-primary radius" value="提交">
                    <input type="button" class="btn btn-default" onclick="history.go(-1)" value="返回">
                </div>
            </div>

        </form>
    </div>
    <script>
        $(function(){

            var ok1 = false;
            var ok2 = false;
            var ok3 = false;
            var ok4 = false;
            // 版位名称失去焦点事件
            $('input[name="p_name"]').blur(function(){
                if($('input[name="p_name"]').val()!=''){
                    $(this).next().text('');
                }
            })
            // 版位唯一标识失去焦点事件
            $('input[name="ad_tag"]').blur(function(){
                if($('input[name="ad_tag"]').val()!=''){
                    $(this).next().text('');
                    $.get('/admin/adPositionAjax',{ad_tag:$('input[name="ad_tag"]').val()},function(data){
//                        alert($data);
                        if(data.status==0){
                            layer.msg(data.msg,{icon:2});
                            return ok2 = false;
                        }
                        if(data.status==1){
                            // layer.msg(data.msg,{icon:1});
                            return ok2 = true;
                        }
                    })
                }
            })
            // 收费标准失去焦点事件
            $('input[name="standard"]').blur(function(){
                if($('input[name="standard"]').val()!=''){
                    $(this).next().text('');
                }
            })
            // 状态失去焦点事件
            $('input[name="status"]').blur(function(){
                if($('input[name="status"]').val()!=''){
                    $(this).next().text('');
                }
            })

            // 表单提交事件
            $('form').submit(function(){
                if($('input[name="p_name"]').val()!=''){
                    ok1 = true;
                }else{
                    $('input[name="p_name"]').next().text('版位名称不能为空');
                    ok1 = false;
                }
                if($('input[name="ad_tag"]').val()!=''){
                    ok2 = true;
                }else{
                    $('input[name="ad_tag"]').next().text('版位唯一标识不能为空');
                    ok2 = false;
                }
                if($('input[name="standard"]').val()!=''){
                    ok3 = true;
                }else{
                    $('input[name="standard"]').next().text('收费标准不能为空');
                    ok3 = false;
                }
                if($('input[name="status"]').val()!=''){
                    ok4 = true;
                }else{
                    $('input[name="status"]').next().text('状态不能为空');
                    ok4 = false;
                }

                if(ok1 && ok2 && ok3 && ok4){
                    return true;
                }else{
                    layer.msg('信息未填完整',{icon:2});
                    return false;
                }
            })
        })
    </script>

@endsection