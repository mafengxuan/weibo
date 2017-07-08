@extends('admin.layout.blank')
@section('body')
    @if (count($errors) > 0)
        <div class="mark" style="color:red">
            <ul>
                @if(is_object($errors))
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @else
                    <li>{{ $errors }}</li>
                @endif
            </ul>
        </div>
    @endif
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{url('admin/dorepass')}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>

                <div class="formControls col-xs-4 col-sm-3">
                    <input type="text" disabled class="input-text" value="{{session('user')->username}}" placeholder="" id="username" name="username">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>原密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="请输入原始密码" id="password" name="password_o">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="新密码6-18位" id="password" name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-4 col-sm-3">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="再次确认密码" id="password" name="password_c">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>





@endsection