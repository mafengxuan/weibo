<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Admin_log;
use App\Http\Model\Profit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AuditController extends Controller
{
    /**
     *
     *广告审核页面
     *
     */
    public function index(Request $request)
    {
        // 根据keywords搜索
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            // 获取所有状态为未发布的数据  搜索
            $data = Ad::whereIn('status',[2,4])->where('ad_name','like','%'.$key.'%')->paginate(10);

            $status = array(1=>'已发布',2=>'待审核',3=>'审核已驳回',4=>'审核未收款');
            return view('admin/ad/audit',['data'=>$data,'status'=>$status,'key'=>$key]);
        }else{
            $key = '';
            // 获取所有状态为未发布的数据
            $data = Ad::whereIn('status',[2,4])->orderBy('aid','asc')->paginate(10);

            $status = array(1=>'已发布',2=>'未发布',3=>'审核已驳回',4=>'审核未收款');
            //添加到列表页
            return view('admin/ad/audit',['data'=>$data,'status'=>$status,'key'=>$key]);
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
     *
     *
     *
     * 广告审核
     *
     */
    public function update(Request $request, $id)
    {
        $session = $request->session()->get('user');
        $auditor = $session->username;
        $sta = Input::get('sta');
        // ajax传过来的值是1执行审核
        if($sta== 1){
            $res = Ad::where('aid',$id)->update(['status'=>4,'a_time'=>time(),'auditor'=>$auditor]);
            if($res){
                $content = '广告审核通过: 编号'.$id;
                Admin_log::dolog($content);

                $data = [
                    'status' => 0,
                    'msg'    =>'审核已通过!'
                ];
            }else{
                $content = '广告审核未通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核未通过!'
                ];
            }
            return $data;
        }
        // ajax传过来的值是2执行驳回
        if($sta == 2){
            $res = Ad::where('aid',$id)->update(['status'=>3,'a_time'=>time(),'auditor'=>$auditor]);
            if($res){
                $content = '广告审核驳回: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已驳回!'
                ];
            }else{
                $content = '广告审核驳回失败: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核驳回失败!'
                ];
            }
            return $data;
        }
    }
    /*
     * 财务审核
     */
    public function charge(Request $request, $id)
    {
        $session = $request->session()->get('user');
        $auditor = $session->username;
        $sta = Input::get('sta');
        // ajax传过来的值是1执行审核
        if($sta== 1){
            $res = Ad::where('aid',$id)->update(['status'=>1,'a_time'=>time(),'auditor'=>$auditor]);
            $input = Ad::where('aid',$id)->first()->toArray();

            $order['pid'] = $input['pid'];
            $order['aid'] = $input['aid'];
            $order['username'] = $input['username'];
            $order['num'] = $input['ad_num'];
            $order['price'] = $input['ad_price'];
            $order['o_time'] = $input['ad_ctime'];
//            dd($order);
            $re = Ad_order::insertGetId($order);
            // 给广告收益统计表添加数据
            $bb = Ad_order::where('oid',$re)->get()->toArray();
            $ad = Profit::all(['f_time'])->toArray();
            $cc = [];
            foreach($ad as $k=>$v){
                $cc[] = $v['f_time'];
            }
            $bb[0]['o_time'] = date('Y-m-d',$bb[0]['o_time']);
            // 如果当日已经添加一条数据则执行修改 否则重新添加一条数据
                if (in_array($bb[0]['o_time'], $cc)) {
                    $update = Profit::where('f_time', $bb[0]['o_time'])->first()->toArray();
                    $mon = $update['price'] + $bb[0]['price'];
                    Profit::where('f_time', $bb[0]['o_time'])->update(['price' => $mon]);
                } else {
                    $pro['price'] = $bb[0]['price'];
                    $pro['f_time'] = date('Ymd',time());
                    Profit::create($pro);
                }

            if($res && $re){
                $content = '财务审核通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已通过!'
                ];
            }else{
                $content = '财务审核未通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核未通过!'
                ];
            }
            return $data;
        }
        // ajax传过来的值是2执行驳回
        if($sta == 2){
            $res = Ad::where('aid',$id)->update(['status'=>3,'a_time'=>time(),'auditor'=>$auditor]);
            if($res){
                $content = '财务审核驳回: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已驳回!'
                ];
            }else{
                $content = '财务审核失败: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核驳回失败!'
                ];
            }
            return $data;
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
        //
    }


}
