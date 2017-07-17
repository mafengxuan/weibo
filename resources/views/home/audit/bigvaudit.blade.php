@extends('home.layout.center')
@section('show')

    <div class="result_wrap">
        <form action="{{url('home/company')}}" method="post" id="art_form" enctype="multipart/form-data">
            {{csrf_field()}}
            <td>
                <div class="form-group">
                    <label for="company_name">大V认证名称</label>
                    <input type="text" style="width:400px" class="form-control" id="v_name" name="v_name" placeholder="大V认证名称"><button type="button" class="btn btn-info" onclick="checkname()">验证是否注册</button>
                </div>
                <div class="form-group">
                    <label >认证类型</label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="inlineRadio1" value="1" checked> 网红
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="inlineRadio2" value="2"> 名人
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="inlineRadio3" value="3"> 机构
                    </label>
                </div>
                <button class="btn btn-success" onclick="doaudit()">提交</button>
        </form>
    </div>
    <script>
        //ajax提交用户认证信息
        function doaudit()
        {
            $.post("{{url('home/bigv/doaudit')}}",$('form').serialize(),function(data){
                if(data.status=='0'){
                    location.href="{{url('home/myaudit')}}";
                }else{
                    alert('信息提交失败');
                }
            });
        }
    </script>
    <script>
        //ajax判断用户提交名称是否在User_vs表中存在
        function checkname()
        {
            $.post("{{url('home/bigv/checkname')}}",$('form').serialize(),function(data){
                if(data.status=='0'){
                    alert('未注册可用');
                }else{
                    alert('名称已注册');
                }
            });
        }

    </script>
    <script>
        //bootstrapValidator表单验证
        $(function () {
            <!--数据验证-->
            $("#art_form").bootstrapValidator({
                message:'This value is not valid',
//            定义未通过验证的状态图标
                feedbackIcons: {/*输入框不同状态，显示图片的样式*/
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
//            字段验证
                fields:{
//                用户名
                    v_name:{
                        message:'大V名称非法',
                        validators:{
//                        非空
                            notEmpty:{
                                message:'大V名称不能为空'
                            },
//                        限制字符串长度
                            stringLength:{
                                min:2,
                                max:20,
                                message:'大V名称长度必须位于3到20之间'
                            }
                        }
                    }
                }
            })

        })
    </script>
@endsection