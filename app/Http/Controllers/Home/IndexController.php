<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Attention;
use App\Http\Model\Collect;
use App\Http\Model\Comment;
use App\Http\Model\Microblog;
use App\Http\Model\Navigation;
use App\Http\Model\Reply;
use App\Http\Model\User_commerce;
use App\Http\Model\User_common;
use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Link;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonindexController
{
    /**
     * 前台首页
     *
     *
     */
    public function index()
    {

        if(empty(session('user_home'))){
            return redirect('home/login/login');
        }

        $microblog = Microblog::join('user_commons','microblogs.uid','=','user_commons.uid')->orderBy('ctime','desc')->get();


        return view('home.index.index',compact('microblog'));

    }


    public function microblog(Request $request){
        $data = Microblog::orderBy('mcount','desc')->take(10)->get();
        return view('home/microblog/microblog',compact('data'));

    }

    /**
     *
     * 发布微博
     */
    public function microblogAjax(Request $request){

        //去除token值
        $input = Input::except('_token');

        $input['ctime'] = time();


        $input['uid'] = session('user_home')->uid;
        $input['email'] = session('user_home')->email;
        $input['phone'] = session('user_home')->phone;

//        如果成功跳转到文章列表页  如果失败 返回发布微博页面
        $re = Microblog::create($input);
        if($re){

            return redirect('home/index');
        }else{

            return back()->with('error','发表失败');
        }

    }




}
