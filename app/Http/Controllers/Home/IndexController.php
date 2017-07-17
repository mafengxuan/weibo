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
