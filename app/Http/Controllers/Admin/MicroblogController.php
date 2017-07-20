<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Microblog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MicroblogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //如果请求携带keywords参数说明是通过查询跳转进入index方法 否则通过导航栏进入
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            //查询数据并分页
            $microblog = Microblog::where('phone','like',"%".$key."%")->paginate(10);
            return view('admin.microblog.index',['data'=>$microblog,'key'=>$key]);
        }else{
            $key = '';
            //查询出microblog表的所有数据
            $microblog = Microblog::orderBy('mid','asc')->paginate(10);
            //添加微博管理视图
            return view('admin.microblog.index',['data'=>$microblog,'key'=>$key]);
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
