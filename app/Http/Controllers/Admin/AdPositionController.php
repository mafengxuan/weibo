<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Ad;
use App\Http\Model\Ad_position;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $data = Ad_position::all();
            $ap = Ad_position::lists('pid')->all();
            $ad = Ad::lists('pid')->all();

            foreach ($ap as $k=>$v){
                if(in_array($v,$ad)){
                    Ad_position::where('pid',$v)->update(['status'=>1]);
                }else{
                    Ad_position::where('pid',$v)->update(['status'=>2]);
                }
            }
            $status = array(1=>'占用',2=>'闲置');
            return view('admin/ad/adPosition',['data'=>$data,'status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ad.adPositionadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取表单所有数据
        $input = Input::except('_token');
        // 插入广告位表
        $res = Ad_position::create($input);
        // 如果成功跳转到广告列表页  如果失败 返回添加页面
        if($res){
            return redirect('admin/adPosition');
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
        //根据传入的要修改的记录的ID 获取广告记录

        $data = Ad_position::find($id);
        return view('admin.ad.adPositionEdit',compact('data'));
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

        //根据id获取修改记录
        $ad = Ad_position::find($id);
        //根据请求传过来的参数获取到要修改成的记录
        $input = Input::except('_token','_method');
        //更新

        $res = $ad->update($input);

        //如果成功跳转到列表页  失败返回修改页
        if($res){
            return redirect('admin/adPosition');
        }else{
            return back()->with('error','修改失败');
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
        //删除对应id的广告位
        $re =  Ad_position::where('pid',$id)->delete();
        //0表示成功 其他表示失败
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
    public function adPositionAjax(Request $request)
    {
        $in = $request['ad_tag'];
        $re = Ad_position::where('ad_tag',$in)->value('ad_tag');
//        return $re;
        if($re != ''){
            $data = [
                'status'=>0,
                'msg'=>'唯一标识已存在！'
            ];
        }else{
            $data = [
                'status'=>1,
            ];
        }
        return $data;

    }
}
