<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_common;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct(){

//        头像  $face
        //获取登陆者的uid
        $uid = session('user_home')->uid;
        //从数据库获取头像
       $facee =  User_common::where('uid',$uid)->first()['face'];
        //使用三元运算符判断用户是否上传了头像,没有就给一个默认头像
       $face =  empty($facee) ? 'http://lamp182-weibo.oss-cn-beijing.aliyuncs.com/uploads/20170719/201707191939375622.jpg' : $facee;
        //把头像分享出去
        view()->share('face', $face);
    }
}
