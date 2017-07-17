<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Comment;
use App\Http\Model\Microblog;
use App\Http\Model\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * 前台首页
     *
     *
     */
    public function index()
    {
        //查询microblog表的数据 根据浏览量查询前十条
        $data = Microblog::orderBy('mcount','desc')->take(10)->get();
//        $data = str_limit($a, $limit = 10, $end = '...');
        //引入热门视图
        return view('home/index/index',compact('data'));
//            return view('home.index.index');
    }

    public function microblog(){
        $data = Microblog::orderBy('mcount','desc')->take(10)->get();
        return view('home/microblog/microblog',compact('data'));
    }
    public function microblogAjax(Request $request){

        //去除token值
        $input = Input::except('_token');
//        获取请求中的所有数据，除了_token  file_upload
//        $input = Input::except('_token','file_upload','');
//        $input['art_time'] = time();
//        dd($input);
//        dd($input);
//        通过articel模型的create  or   save 添加到数据库
        $re = Microblog::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            return redirect('home/index');
        }else{
            return back()->with('error','发表失败');
        }

//        $re = Microblog::create($input);
//
//        if($re){
//            return redirect('admin/index');
//        }else{
//            return back()->with('error','添加失败');
        }







}
