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

       $face =  empty($facee) ? 'uploads/201707160056295086.jpg'  : $facee;

        view()->share('face', $face);
    }
}
