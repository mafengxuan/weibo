@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add" action="admin/hotcontent" method="post">
            {{csrf_field()}}
            @foreach ($data as $k=>$v)
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">邮箱登录：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$v->email}}" placeholder="" id="" name="email">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机登录：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$v->phone}}" placeholder="" id="" name="phone">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">标题id：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$v->tid}}" placeholder="" id="" name="tid">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="content" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{$v->content}}</textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" name="ctime" value="{{date('Y-m-d H:i:s',time())}}" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate">
                </div>
            </div>
            @endforeach
        </form>
    </div>
@endsection