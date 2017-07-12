<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     *  显示个人中心页面
     */
    public function index()
    {

        return view('home.user.user');
    }
}
