<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/admin/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/bootstrap/css/bootstrapValidator.css')}}" rel="stylesheet">
    <script src="{{asset('/admin/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrapValidator.js')}}"></script>

</head>

<div class="container col-lg-3 col-lg-offset-3">
    <div class="page-header">

    </div>
    <div>
        <form id="registerForm" method="post" class="form-horizontal" action="">
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            {{--用户名--}}
            <div class="form-group" col-xs-4 col-sm-3>
                <label class="control-label" for="username">*用户名:</label>
                <input type="text" class="form-control" placeholder="" disabled name="username" value="{{$data->username}}" id="username">
            </div>
            <div class="form-group">
                <!--密码-->
                <label class="control-label" for="password">*请输入新密码:</label>
                <input type="password" class="form-control" placeholder="请输入新密码" name="password" id="password">
            </div>
            <div class="form-group">
                <!--确认密码-->
                <label class="control-label" for="repassword">*请输入确认密码:</label>
                <input type="password" class="form-control" placeholder="请输入确认密码" name="repassword" id="repassword">
            </div>
            <div class="form-group">
                <button class="btn btn-primary form-control" onclick="EditPwd({{$data->id}})">重置密码</button>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript" src="{{asset('/admin')}}/lib/layer/2.4/layer.js"></script>
<script>

        function EditPwd(id){

            //询问框
            layer.confirm('确定重置密码吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/manager')}}/"+id,$('form').serialize(),function(data){
                    if(data.status == 0){

                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });


            }, function(){

            });

        }
</script>


<script>
        <!--数据验证-->
        $("#registerForm").bootstrapValidator({
            message:'This value is not valid',
//            定义未通过验证的状态图标
            feedbackIcons: {/*输入框不同状态，显示图片的样式*/
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
//            字段验证
            fields:{
//                密码
                password:{
                    message:'密码非法',
                    validators:{
                        notEmpty:{
                            message:'密码不能为空'
                        },
//                        限制字符串长度
                        stringLength:{
                            min:6,
                            max:18,
                            message:'密码长度必须位于6到18之间'
                        },
//                        相同性检测
                        identical:{
//                            需要验证的field
                            field:'password',
                            message:'两次密码输入不一致'
                        },
//                        基于正则表达是的验证
                        regexp:{
                            regexp:/^[a-zA-Z0-9_\.]+$/,
                            message:'密码由数字字母下划线和.组成'
                        }
                    }
                },

                //                确认密码
                repassword:{
                    message:'密码非法',
                    validators:{
                        notEmpty:{
                            message:'密码不能为空'
                        },
//                        限制字符串长度
                        stringLength:{
                            min:6,
                            max:18,
                            message:'密码长度必须位于6到18之间'
                        },
//                        相同性检测
                        identical:{
//                            需要验证的field
                            field:'password',
                            message:'两次密码输入不一致'
                        },
//                        基于正则表达是的验证
                        regexp:{
                            regexp:/^[a-zA-Z0-9_\.]+$/,
                            message:'密码由数字字母下划线和.组成'
                        }
                    }
                },
            }
        })
</script>

