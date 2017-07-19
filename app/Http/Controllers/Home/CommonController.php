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
        $uid = session('user_home')->uid;
       $facee =  User_common::where('uid',$uid)->first()['face'];

       $face =  empty($facee) ? 'http://lamp182-weibo.oss-cn-beijing.aliyuncs.com/uploads/20170719/201707191939375622.jpg' : $facee;

        view()->share('face', $face);
    }
}
