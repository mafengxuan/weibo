@extends('home.layout.center')
@section('show')

                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal" action="{{url('home/doindex')}}" method="post">
                        {{csrf_field()}}
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">昵称</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="nickname" value="{{$user3['nickname']}}" disabled placeholder="" style="width:250px;">
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">真实姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="realname" value="{{$user['realname']}}" disabled placeholder="" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">邮箱</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="email" value="{{$email}}" disabled placeholder="" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" value="{{$user['qq']}}" placeholder="" disabled style="width:250px;">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" onfocus="WdatePicker()" id="datemin" value="{{date('Y年m月d日',$user['birth'])}}" name="birth" disabled class="input-text Wdate" style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" value="{{$user['address']}}" placeholder="" disabled style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">性别</label>
                            <div class="am-form-content sex">
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="1" @if($user['sex'] == 1) checked @endif disabled data-am-ucheck> 男
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="2" @if($user['sex'] == 2) checked @endif disabled data-am-ucheck> 女
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="sex" value="3" @if($user['sex'] == 3) checked @endif disabled data-am-ucheck> 保密
                                </label>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">年龄</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="age" value="{{$user['age']}}" placeholder="" disabled style="width:250px;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">简介</label>
                            <div class="am-form-content">
                                <textarea name="introduction"  disabled id="" cols="30" rows="3">{{$user['introduction']}}</textarea>
                            </div>
                        </div>
                        <div class="am-form-group safety">
                            <label for="user-safety" class="am-form-label">账号安全</label>
                            <div class="am-form-content safety">
                                <a href="safety.html">
                                    <span class="am-icon-angle-right"></span>
                                </a>
                            </div>
                        </div>
                        <div class="info-btn">
                            <input type="button" class="am-btn am-btn-primary" onclick="history.go(-1)" value="返回">
                            <a href="{{url('home/edit')}}" class="am-btn am-btn-warning">编辑个人资料</a>
                        </div>
                    </form>
                </div>

   @endsection