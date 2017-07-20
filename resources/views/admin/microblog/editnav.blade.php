@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add" action="{{url('admin/navigation/'.$data->nid)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">导航名称：</label>
                <div class="formControls col-xs-1 col-sm-3">
                    <input type="text" class="input-text" value="{{$data->nav_name}}" placeholder="" id="" name="nav_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">导航排序：</label>
                <div class="formControls col-xs-1 col-sm-3">
                    <input type="text" class="input-text" value="{{$data->nav_sort}}" placeholder="" id="" name="nav_sort">
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
