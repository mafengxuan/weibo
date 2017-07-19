@extends('home.layout.center')
@section('show')
    <!--邮箱激活 -->
    <style>
        .xo{
            color: green;
            font-size:30px;
        }
    </style>

    <div class="info-main">
        <form class="am-form am-form-horizontal" action="{{url('home/doemail')}}" method="post">
            {{csrf_field()}}
            <b class="xo">信息已发送到您的邮箱,请您查看邮箱进行激活</b>
            <div class="am-form-group safety">
                <label for="user-safety" class="am-form-label">账号安全</label>
                <div class="am-form-content safety">
                    <a href="safety.html">
                        <span class="am-icon-angle-right"></span>
                    </a>
                </div>
            </div>
            <div class="info-btn">
                <input type="button" class="am-btn am-btn-primary" onclick="history.go(-1)"                          value="返回">
            </div>
        </form>
    </div>
@endsection