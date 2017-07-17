@extends('home.layout.index')
@section('main-body')
    {{--<div class="articles entertainment">--}}
        {{--<header>--}}
            {{--<h3 class="title-head"><font><font>娱乐</font></font></h3>--}}
        {{--</header>--}}
        {{--<div class="article">--}}
            {{--<div class="article-left">--}}
                {{--<a href="single.html"><img src="images/ent1.jpg"></a>--}}
                {{--<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>--}}
                {{--<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>--}}
                {{--<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>--}}
                {{--<script id="editor" type="text/plain" name="art_content" style="width:850px;height:200px;"></script>--}}
                {{--<script type="text/javascript">--}}
                    {{--var ue = UE.getEditor('editor');--}}
                {{--</script>--}}
                {{--<style>--}}
                    {{--.edui-default{line-height: 28px;}--}}
                    {{--div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body--}}
                    {{--{overflow: hidden; height:20px;}--}}
                    {{--div.edui-box{overflow: hidden; height:22px;}--}}
                {{--</style>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
    {{--</div>--}}

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
                                <input type="submit" value="提交">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <script>
//////
//                    var $content = $('input[name="content]').val();
//                    alert($content);
//                    function fun(){
//                        $.ajax({
//                            url:'home/microblogAjax',
//                            type:'POST', //默认get方式
//                            data:{mid:mid},
//                            success:function(msg){
//                                $.each(msg,function(i){
////                                    console.log(msg[i]);
//                                    val1: $("content").val()
//                                })
//
//                            },
//                            dataType:'json',
//                            async:true, //默认true
//                        })
//                    }
                </script>
            </div>
        </div>


    </div>

@endsection