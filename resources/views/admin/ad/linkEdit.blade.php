@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="art_form" action="{{url('admin/link/'.$data->lid)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->link_name}}" placeholder="" id="" name="link_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">链接地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->link_url}}" placeholder="" id="" name="link_url">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">链接标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->link_title}}" placeholder="" id="" name="link_title">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">状态：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="2" placeholder="" id="number" name="status">
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