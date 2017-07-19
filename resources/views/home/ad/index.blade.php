@extends('home.layout.center')
@section('show')
    <style>
        .introduce{padding-top:58px;padding-bottom:22px;}.introduce li{float:left;width:270px;margin-right:55px;line-height:22px;}.introduce li h3{font-size:22px;margin-bottom:13px;line-height:22px;}.introduce li .introduction{font-size:14px;color:#727272;}.introduce li.last{margin-right:0;float:right;}.introduce1{padding-bottom:28px;}.introduce1 li{width:196px;margin-right:45px;}.introduce1 .pro{width:96px;height:96px;background:#b1e0f0;border-radius:96px;position:relative;margin:0 auto 43px;}.introduce1 .pro01{background:#f8d790;}.introduce1 .pro02{background:#77e0d1;}.introduce1 .pro03{background:#f9b898;}.introduce1 .icon{text-align:center;top:50%;left:50%;margin:-25px 0 0 -28px;position:absolute;}.introduce1 h3{text-align:center;}.icon{background:url("../../../img/fanstone/icon.png");}.icon_weibo{width:59px;height:52px;background-position:0 0;}.icon_fans{width:57px;height:50px;background-position:-76px 0;}.icon_upload{width:57px;height:50px;background-position:-154px 0;}.icon_rising{width:57px;height:50px;background-position:-231px 0;}
    </style>

    <div>
        <a href="{{url('home/adadd')}}" style="float:right; ">
            <button class="btn btn-primary">我要发布广告</button>
        </a>
    </div>
    <div>
        <p>我的订单</p>
    </div>
    <table class="table table-bordered">
        <tr>
            <th style="text-align:center; width:90px;">广告名称</th>
            <th style="text-align:center; width:100px;">广告位</th>
            <th style="text-align:center;">广告图片</th>
            <th style="text-align:center;">广告链接</th>
            <th style="text-align:center;">广告简介</th>
            <th style="text-align:center; width:180px;">投放时间</th>
            <th style="text-align:center; width:90px;">状态</th>

        </tr>
        @foreach($data as $k=>$v)
        <tr>
            <td style="vertical-align:middle;">{{$v->ad_name}}</td>
            <td style="vertical-align:middle;">{{$position[$v->pid]}}</td>
            <td style="vertical-align:middle;"><img src="{{$v->ad_img}}" width="100" alt=""></td>
            <td style="vertical-align:middle;">{{$v->ad_url}}</td>
            <td style="vertical-align:middle;">{{$v->ad_brief}}</td>
            <td style="vertical-align:middle;">{{date('Y-m-d',$v->ad_ctime)}}至{{date('Y-m-d',$v->ad_etime)}}</td>
            <td style="vertical-align:middle;">{{$status[$v->status]}}</td>
        </tr>
        @endforeach
    </table>
    <div class="area">
        <div class="introduce introduce1 clearfix">
            <ul>
                <li style="width:165px; margin-left:50px;">
                    <div class="pro">
                        <div class="icon icon_weibo"></div>
                    </div>
                    <h3 >增加博文曝光</h3>
                    <div class="introduction">将精彩创意推送到目标用户显著位置，大幅提升博文的互动量。</div>
                </li>
                <li style="width:165px;">
                    <div class="pro pro01">
                        <div class="icon icon_fans"></div>
                    </div>
                    <h3>增长账号粉丝</h3>
                    <div class="introduction">将账号推荐给潜在粉丝，实现关注转化，积累高质量的社交资产。</div>
                </li>
                <li style="width:165px;">
                    <div class="pro pro02">
                        <div class="icon icon_upload"></div>
                    </div>
                    <h3>拉动应用下载</h3>
                    <div class="introduction">App应用开启客户端定位推广，实现推荐应用直接下载安装。</div>
                </li>
                <li style="width:165px; float:right;">
                    <div class="pro pro03">
                        <div class="icon icon_rising"></div>
                    </div>
                    <h3>提升品牌知名度</h3>
                    <div class="introduction">集中稀缺资源强势曝光、双平台渗透用户微博浏览路径，让品牌一鸣惊人、一夜成名。</div>
                </li>
            </ul>
        </div>
    </div>

@endsection