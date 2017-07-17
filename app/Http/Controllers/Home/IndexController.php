<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Comment;
use App\Http\Model\Microblog;
use App\Http\Model\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 前台首页
     *
     *
     */
    public function index()
    {
        //获取微博列表
        $microblog = Microblog::join('user_commons','microblogs.uid','=','user_commons.uid')->get();
//        dd($microblog);
        return view('home.index.index',compact('microblog'));
    }

    /**
     * 获取评论
     */
    public function comment($id)
    {

        $comments = Comment::where('mid',$id)->join('user_commons','comments.uid','=','user_commons.uid')->orderBy('ctime','desc')->get();
        $data = $comments->toArray();
        foreach($data as $k => $v)
        {

            $replys = Reply::where('cid',$v['cid'])->join('user_commons','replys.uid','=','user_commons.uid')->orderBy('ctime','desc')->get();
            $data[$k]['reply'] = $replys->toArray();
        }


//        dd($data);
        return $data;
    }

    /**
     * 执行评论
     */
    public function docomment(Request $request,$id)
    {
        $data['content'] = $request -> input('comment');
        $data['mid'] = $id;
        $data['uid'] = session('user_home')->uid;
        $data['email'] = session('user_home')->email;
        $data['phone'] = session('user_home')->phone;
        $data['ctime'] = time();
        $re = Comment::create($data);
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'评论成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'评论失败'
            ];
        }

        return $arr;
    }

    /**
     * 执行回复
     */
    public function reply(Request $request)
    {
        $data['content'] = $request -> input('content');
        $data['mid'] = $request -> input('mid');
        $data['cid'] = $request -> input('cid');
        $data['ctime'] = time();
        $data['uid'] = session('user_home')->uid;
        $data['email'] = session('user_home')->email;
        $data['phone'] = session('user_home')->phone;

        $re = Reply::create($data);
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'回复成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'回复失败'
            ];
        }

        return $arr;



    }

}
