@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add" action="{{url('admin/label')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">标签名称：</label>
                <div class="formControls col-xs-1 col-sm-3">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="tname">
                </div>
            </div>

            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <input type="submit" class="btn btn-primary radius" value="提交">
                </div>
            </div>
        </form>
    </div>
@endsection
