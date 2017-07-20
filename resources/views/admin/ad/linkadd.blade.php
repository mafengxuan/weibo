@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="art_form" action="{{url('admin/link')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="link_name" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">链接地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="link_url" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">链接标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="link_title" style="width:800px;">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">排序：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="number" name="link_sort" style="width:800px;">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="1" placeholder="" id="number" name="status" style="width:800px;"><span style=" text-decoration: none" class="btn btn-link"></span>
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
            // 名称失去焦点事件
            $('input[name="link_name"]').blur(function(){
                if($('input[name="link_name"]').val()!=''){
                    $(this).next().text('');
                }
            })
            // 链接地址失去焦点事件
            $('input[name="link_url"]').blur(function(){
                if($('input[name="link_url"]').val()!=''){
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
            var ok1 = false;
            var ok2 = false;
            var ok3 = false;
            $('form').submit(function(){
                if($('input[name="link_name"]').val()!=''){
                    ok1 = true;
                }else{
                    $('input[name="link_name"]').next().text('名称不能为空');
                    ok1 = false;
                }
                if($('input[name="link_url"]').val()!=''){
                    ok2 = true;
                }else{
                    $('input[name="link_url"]').next().text('链接地址不能为空');
                    ok2 = false;
                }
                if($('input[name="status"]').val()!=''){
                    ok3 = true;
                }else{
                    $('input[name="status"]').next().text('状态不能为空');
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