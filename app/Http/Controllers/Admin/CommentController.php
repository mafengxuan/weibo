<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {

        ////如果请求携带keywords参数说明是通过查询跳转进入index方法 否则通过导航栏进入
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            //查询数据并分页

            $comment = Comment::where('content','like',"%".$key."%")->where('mid',$id)->paginate(2);

            return view('admin.microblog.comment',['data'=>$comment,'key'=>$key]);
        }else{
            $key = '';
            //查询出comments表的所有数据

            $comment = Comment::orderBy('cid','asc')->where('mid',$id)->paginate(2);

            //添加评论视图
            return view('admin.microblog.comment',['data'=>$comment,'key'=>$key]);
        }
    }

}
