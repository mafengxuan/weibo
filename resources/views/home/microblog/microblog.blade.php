@extends('home.layout.index')
@section('main-body')
    <div class="col-md-8 content-left">
        <div class="slider">
            <div class="callbacks_wrap">
                <form action="{{url('home/microblogAjax')}}" method="post">
                    <table class="add_tab">
                        <tbody>
                        {{csrf_field()}}
                        <tr>
                            <td>
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                <script id="editor" type="text/plain" name="content" style="width:850px;height:500px;"></script>
                                <script type="text/javascript">
                                    var ue = UE.getEditor('editor');
                                </script>
                                <style>
                                    .edui-default{line-height: 28px;}
                                    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                    {overflow: hidden; height:20px;}
                                    div.edui-box{overflow: hidden; height:22px;}
                                </style>

                            </td>

                        </tr>




                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" value="发布" style="position:relative;right:50px;margin-top:10px ">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>


    </div>

@endsection