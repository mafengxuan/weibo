<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{
    /**
     *
     *
     * 返回友情链接主页面
     */
    public function index(Request $request)
    {
        $data = Link::orderBy('link_sort','asc')->get();
        $status = array(1=>'发布',2=>'未发布');
        return view('admin.ad.link',compact('data','status'));
    }
    /*
     * 友情链接排序处理
     */
    public function changeOrder(Request $request)
    {

//      先找到要修改排序的记录
        $input =  $request->except('_token');

        $link = Link::where('lid',$input['lid'])->first();

//        更新这条记录的cate_order字段
        $link->link_sort = $input['link_sort'];
        $re = $link->update();
//        如果修改成功
        if($re){
            $data =[
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $data =[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     *
     *返回友情链接添加页面
     *
     */
    public function create()
    {
        return view('admin.ad.linkadd');
    }

    /**
     *
     *
     * 执行友情链接添加
     *
     */
    public function store(Request $request)
    {
        //   获取请求中的所有数据，除了_token
        $input = Input::except('_token');
//        dd($input);

//        通过articel模型的create  or   save 添加到数据库
        $re = Link::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            $content = '添加友情链接: '.$input['link_name'];
            Admin_log::dolog($content);

            return redirect('admin/link');
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
     * 返回友情链接修改页面
     *
     *
     *
     */
    public function edit($id)
    {
        $data = Link::find($id);
        return view('admin.ad.linkEdit',compact('data'));
    }

    /**
     *
     *
     * 执行友情链接修改
     *
     *
     */
    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        //从请求中获取传过来的数据
        $input = Input::except('_token','_method');
        $re = $link->update($input);

        if($re){
            $content = '修改友情链接: '.$id;
            Admin_log::dolog($content);
//            如果添加成功跳转到分类列表页
            return redirect('admin/link');
        }else{
            return back()->with('error','修改失败')->withInput();
        }
    }

    /**
     * 执行友情链接删除
     *
     *
     *
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  Link::where('lid',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $content = '删除友情链接: '.$id;
            Admin_log::dolog($content);
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
