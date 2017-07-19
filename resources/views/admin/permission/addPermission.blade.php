@extends('admin.layout.blank')
@section('body')
<div class="page-container">
    @if (count($errors) > 0)
        <div class="mark" style="color:red">
            <ul>
                @if(is_object($errors))
                    @foreach ($errors->all() as $error)
                        <li class="xxoo">{{ $error }}</li>
                    @endforeach
                @else
                    <li class="xxoo">{{ $errors }}</li>
                @endif
            </ul>
        </div>
    @endif
    <form class="form form-horizontal" id="art_form" action="{{url('admin/permission')}}" method="post">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>路由名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>权限描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="description">
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
@section('js')
@if(session('success'))
    <script>
        layer.alert('{{session('success')}}',function(){
            parent.location.reload();
        });

    </script>
@endif
@endsection
