@extends('admin.layout.blank')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add" action="admin/hotcontent" method="post">
            {{csrf_field()}}
            @foreach ($data as $k=>$v)
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">用户昵称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{$v->nickname}}
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">手机号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{$v->phone}}
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">内容：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {!! $v->content !!}

                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>日期：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{date('Y-m-d H:i:s',$v->ctime)}}
                    </div>
                </div>
            @endforeach
        </form>
    </div>
@endsection