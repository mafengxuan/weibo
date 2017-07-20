<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ad;
use App\Http\Model\Attention;
use App\Http\Model\Collect;
use App\Http\Model\Comment;
use App\Http\Model\Link;
use App\Http\Model\Microblog;
use App\Http\Model\Navigation;
use App\Http\Model\Reply;
use App\Http\Model\User_common;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonindexController extends Controller
{
    public function __construct()
    {
        //公共模板广告内容

        $pic  = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('status',1)->where('pid',1)->first();
        $pic2 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('status',1)->where('pid',2)->first();
        $pic3 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('status',1)->where('pid',3)->first();
        $pic4 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('status',1)->where('pid',4)->get();
        $pic5 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('status',1)->where('pid',5)->take(12)->get();
        // 友情链接
        $links = Link::orderBy('link_sort','asc')->where('status',1)->get();

        view()->share('pic', $pic);
        view()->share('pic2', $pic2);
        view()->share('pic3', $pic3);
        view()->share('pic4', $pic4);
        view()->share('pic5', $pic5);
        view()->share('links', $links);

        $collect = [];
        $attention = [];
        if(!empty(session('user_home'))){
            //获取收藏
            $recollect = Collect::where('uid',session('user_home')->uid)->get();
            $recollect = $recollect->toArray();
            $arr = [];
            foreach($recollect as $k => $v){
                $arr[] = $v['mid'];
            }
            $collect = $arr;
            //获取关注
            $reattention = Attention::where('uid',session('user_home')->uid)->get();
            $reattention = $reattention->toArray();
            $arr2 = [];
            foreach($reattention as $k => $v){
                $arr2[] = $v['attention_id'];
            }
            $attention = $arr2;
        }


        view()->share('collect', $collect);
        view()->share('attention', $attention);

        $nav= Navigation::orderBy('nav_sort')->get();
        view()->share('nav',$nav);

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
            Microblog::where('mid',$id)->increment('c_count');
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

    /**
     * 收藏
     */
    public function collect($id){

        $data['uid'] = session('user_home')->uid;
        $data['mid'] = $id;
        $re = Collect::create($data);
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'收藏成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'收藏失败'
            ];
        }

        return $arr;
    }

    /**
     * 取消收藏
     */
    public function nocollect($id){

        $uid = session('user_home')->uid;
        $mid = $id;
        $re = Collect::where('uid',$uid)->where('mid',$mid)->delete();
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'取消收藏成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'取消收藏失败'
            ];
        }

        return $arr;
    }

    /**
     * 转发
     */
    public function transpond($id){



        $microblog = Microblog::where('mid',$id)->first();
        $nickname = User_common::where('uid',$microblog['uid'])->first();


        $data['content'] = '<p>@'.$nickname['nickname'].':转发微博</p>'.$microblog['content'];
        $data['uid'] = session('user_home')->uid;
        $data['email'] = session('user_home')->email;
        $data['phone'] = session('user_home')->phone;
        $data['ctime'] = time();

        $re = Microblog::create($data);
        if($re)
        {
            Microblog::where('mid',$id)->increment('t_count');
            $arr = [
                'status' => 0,
                'msg' =>'转发成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'转发失败'
            ];
        }

        return $arr;
    }

    /**
     * 关注
     */
    public function attention($id){

        $data['uid'] = session('user_home')->uid;
        $data['attention_id'] = $id;
        $re = Attention::create($data);
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'关注成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'关注失败'
            ];
        }

        return $arr;
    }

    /**
     * 取消关注
     */
    public function noattention($id){

        $data['uid'] = session('user_home')->uid;
        $data['attention_id'] = $id;
        $re = Attention::where('uid',$data['uid'])->where('attention_id',$data['attention_id'])->delete();
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'取消关注成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'取消关注失败'
            ];
        }

        return $arr;
    }

    /**
     *点赞
     */
    public function zan($id){


        $re = Microblog::where('mid',$id)->increment('p_count');
        if($re)
        {
            $arr = [
                'status' => 0,
                'msg' =>'点赞成功'
            ];
        }else{
            $arr = [
                'status' => 1,
                'msg' =>'点赞失败'
            ];
        }

        return $arr;
    }

}
