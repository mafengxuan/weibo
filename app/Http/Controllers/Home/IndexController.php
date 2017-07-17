<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Comment;
use App\Http\Model\Microblog;
use App\Http\Model\Reply;
use App\Http\Model\User_commerce;
use App\Http\Model\User_common;
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

        //获取微博列表
        $microblog = Microblog::join('user_commons','microblogs.uid','=','user_commons.uid')->get();
//        dd($microblog);
        return view('home.index.index',compact('microblog','data'));

//            return view('home.index.index');
    }


    public function microblog(Request $request){
        $data = Microblog::orderBy('mcount','desc')->take(10)->get();
        return view('home/microblog/microblog',compact('data'));
    }
    public function microblogAjax(Request $request){

        //去除token值
        $input = Input::except('_token');

        $input['ctime'] = time();
//        通过articel模型的create  or   save 添加到数据库

        $value = $request->session()->get('photo');
        $input['uid'] = $value->uid;

//        如果成功跳转到文章列表页  如果失败 返回发布微博页面
        $re = Microblog::create($input);
        if($re){

            return redirect('home/index');
        }else{

            return back()->with('error','发表失败');
        }

        }




    /**
     * 获取评论
     */
    public function comment($id)
    {

        $comments = Comment::where('mid',$id)->join('user_commons','comments.uid','=','user_commons.uid')->get();
        $data = $comments->toArray();
        foreach($data as $k => $v)
        {

            $replys = Reply::where('cid',$v['cid'])->join('user_commons','replys.uid','=','user_commons.uid')->get();
            $data[$k]['reply'] = $replys->toArray();
        }


//        dd($data);
        return $data;
    }

    /**
     * 获取回复
     */
    public function reply($id)
    {

        $replys = Reply::where('cid',$id)->join('user_commons','replys.uid','=','user_commons.uid')->get();
        $data = $replys->toArray();
        return $data;
    }


}
