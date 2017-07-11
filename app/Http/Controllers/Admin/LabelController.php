<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LabelController extends Controller
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
            $label = Tag::where('tname','like',"%".$key."%")->paginate(2);
            return view('admin.microblog.label',['data'=>$label,'key'=>$key]);
        }else{
            $key = '';
            //查询出tags表的所有数据
            $label = Tag::orderBy('tid','asc')->paginate(2);
            //添加导航管理视图
            return view('admin.microblog.label',['data'=>$label,'key'=>$key]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加标签页面
        return view('admin/microblog/addlab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //去除token值
        $input = Input::except('_token');

        $re = Tag::create($input);

        if($re){
            return redirect('admin/label');
        }else{
            return back()->with('error','添加失败');
        }
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
        $data = Tag::where('tid',$id)->first();
        return view('admin.microblog.editlab',compact('data'));
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
        //去除token值
        $input = Input::except('_token','_method');
        $re = Tag::where('tid',$id)->update($input);
        if($re){
            return redirect('admin/label');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  Tag::where('tid',$id)->delete();
        //       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }

}
