@extends('home.layout.center')
@section('show')
                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="user-name2" class="am-form-label">真实姓名</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="realname" placeholder="nickname">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">QQ</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="qq" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">生日</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="birth" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">地址</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name2" name="address" placeholder="name">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-form-label">性别</label>
                            <div class="am-form-content">
                                <input id="user-phone" name="sex" placeholder="telephonenumber" type="input">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">年龄</label>
                            <div class="am-form-content">
                                <input id="user-email" placeholder="Email" name="age" type="input">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">简介</label>
                            <div class="am-form-content">
                                <input id="user-email" placeholder="Email" name="introduction" type="input">
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
                            <div class="am-btn am-btn-danger">保存修改</div>
                        </div>

                    </form>
                </div>

@endsection