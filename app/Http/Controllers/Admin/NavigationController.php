<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\Navigation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NavigationController extends Controller
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
            $navigation = Navigation::where('nav_name','like',"%".$key."%")->paginate(10);
            return view('admin.microblog.navigation',['data'=>$navigation,'key'=>$key]);
        }else{
            $key = '';
            //查询出navigations表的所有数据
            $navigation = Navigation::orderBy('nav_sort','asc')->paginate(10);
            //添加导航管理视图
            return view('admin.microblog.navigation',['data'=>$navigation,'key'=>$key]);
        }
    }


    public function changeOrder(Request $request)
    {

//      先找到要修改排序的记录
        $input =  $request->except('_token');

        $nav = Navigation::where('nid',$input['nid'])->first();

//        更新这条记录的nav_sort字段
        $nav->nav_sort = $input['nav_sort'];
        $re = $nav->update();
//        如果修改成功
        if($re){
            $data =[
                'status'=>0,
                'msg'=>'修改成功'
            ];;
        }else{
            $data =[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加导航页面
        return view('admin.microblog.addnav');
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

        $re = Navigation::create($input);

        if($re){
            $content = '添加导航: '.$input['nav_name'];
            Admin_log::dolog($content);

            return redirect('admin/navigation');
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
        //        找到要修改的用户记录，返回给修改页面
        //        find(1) 也会返回一个对象

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Navigation::where('nid',$id)->first();
        return view('admin.microblog.editnav',compact('data'));
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
        $re = Navigation::where('nid',$id)->update($input);
        if($re){
            $content = '修改导航: 编号'.$id;
            Admin_log::dolog($content);
            return redirect('admin/navigation');
        }else{
            return back()->with('error','添加失败');
        }
    }

     /* Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  Navigation::where('nid',$id)->delete();
        //       0表示成功 其他表示失败
        if($re){
            $content = '删除导航: 编号'.$id;
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
