@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="art_form" action="{{url('admin/adPosition/'.$data->pid)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>版位名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->p_name}}" placeholder="" id="" name="p_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">广告位唯一标识：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->ad_tag}}" placeholder="" id="" name="ad_tag">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">收费标准：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->standard}}" placeholder="" id="" name="standard">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->status}}" placeholder="" id="number" name=status>
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

@endsection