<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Comment;
use App\Http\Model\Microblog;
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
        $pic = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',1)->first();
        $pic2 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',2)->first();
        $pic3 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',3)->first();
        $pic4 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',4)->get();
        $pic5 = Ad_order::orderBy('price','desc')->join('ads','ad_orders.aid','=','ads.aid')->get();
        $links = Link::all();

        return view('home.index.index',compact('microblog','data','pic','pic2','pic3','pic4','pic5','links'));


//            return view('home.index.index');
    }


    public function microblog(Request $request){
        $pic = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',1)->first();
        $pic2 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',2)->first();
        $pic3 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',3)->first();
        $pic4 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',4)->get();
        $pic5 = Ad_order::orderBy('price','desc')->join('ads','ad_orders.aid','=','ads.aid')->get();
        $links = Link::all();
        $data = Microblog::orderBy('mcount','desc')->take(10)->get();
        return view('home/microblog/microblog',compact('data','pic','pic2','pic3','pic4','pic5','links'));
    }
    public function microblogAjax(Request $request){

        //去除token值
        $input = Input::except('_token');

        $input['ctime'] = time();
//        通过articel模型的create  or   save 添加到数据库

        $value = session('user_home')->photo;
        $input['uid'] = session('user_home')->uid;

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
