@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>

@endsection
@section('body')

    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{url('admin/config')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="conf_title" name="conf_title">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="conf_name" name="conf_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input onclick="showTr()" name="field_type" type="radio" value="input" id="type-1" checked>
                        <label for="type-1">input</label>
                    </div>
                    <div class="radio-box">
                        <input onclick="showTr()" name="field_type" type="radio" value="textarea" id="type-2">
                        <label for="type-2">textarea</label>
                    </div>
                    <div class="radio-box">
                        <input onclick="showTr()" name="field_type" type="radio" value="radio" id="type-3">
                        <label for="type-3">radio</label>
                    </div>
                    <div class="field_value" style="display: none;">
                        <input type="text" name="field_value" value="true|开启，false|关闭">
                        <span>radio选项下格式为：true|开启，false|关闭</span>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">说明：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="conf_tip" cols="" rows="" class="textarea"  placeholder="" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
    <script>
        showTr();
        function showTr(){
            if($('input[name=field_type]:checked').val() == 'radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }
        }
    </script>
@endsection
