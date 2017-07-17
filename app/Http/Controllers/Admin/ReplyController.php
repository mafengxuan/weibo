<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //如果请求携带keywords参数说明是通过查询跳转进入index方法 否则通过导航栏进入
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            //查询数据并分页

            $reply = Reply::where('content','like',"%".$key."%")->where('cid',$id)->paginate(2);

            return view('admin.microblog.reply',['data'=>$reply,'key'=>$key]);
        }else{
            $key = '';
            //查询出microblog表的所有数据

            $reply = Reply::orderBy('mid','asc')->where('cid',$id)->paginate(2);

            //添加微博管理视图
            return view('admin.microblog.reply',['data'=>$reply,'key'=>$key]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
