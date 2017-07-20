<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Ad_position;
use App\Http\Model\Admin_log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Services\OSS;

class AdController extends Controller
{
    /**
     * 上传图片
     */
    public function upload()
    {

//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
//            将图片上传到本地服务器
//            $path = $file->move(public_path() . '/uploads', $newName);
            // 将图片上传到OSS 阿里云
            OSS::upload('uploads/'.date('Ymd',time()).'/'.$newName, $file->getRealPath());
//        返回文件的上传路径
            $filepath = 'uploads/'.date('Ymd',time()).'/' . $newName;
            $res = "http://lamp182-weibo.oss-cn-beijing.aliyuncs.com/".$filepath;
            return $res;
        }
    }
    /**
     *
     * 搜索
     * 返回广告主页面
     */
    public function index(Request $request)
    {
        // 根据keywords搜索
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            $data = Ad::where('ad_name','like','%'.$key.'%')->paginate(10);
            $status = array(1=>'已发布',2=>'待审核',3=>'审核已驳回',4=>'审核未付款');
            return view('admin/ad/index',['data'=>$data,'status'=>$status,'key'=>$key]);
        }else{
            $key = '';
            // 获取所有数据
            $data = Ad::orderBy('aid','asc')->paginate(10);
            $status = array(1=>'已发布',2=>'待审核',3=>'审核已驳回',4=>'审核未收款');
            //添加到列表页
            return view('admin/ad/index',['data'=>$data,'status'=>$status,'key'=>$key]);
        }
    }

    /**
     * 返回添加页面
     *
     *
     */
    public function create(Request $request)
    {
        // 获取数据
        $adPosition = Ad_position::all();
        $session = $request->session()->get('user');
        // 返回页面
        return view('admin.ad.addAd',compact('adPosition','session'));
    }

    /**
     *
     * 接收广告添加的数据
     * 保存到数据库
     *
     */
    public function store(Request $request)
    {
        //  获取请求中的所有数据，除了_token  file_upload
        $input = Input::except('_token','file_upload');
        $adOrder = Ad_order::orderBy('oid','desc')->max('oid');
        $input['ad_ctime'] = strtotime($input['ad_ctime']);
        $input['ad_etime'] = strtotime($input['ad_etime']);
        $input['oid'] = $adOrder+1;
        $input['a_time'] = $input['ad_ctime'];
        //        通过ad模型的create  or   save 添加到数据库
        $re = Ad::create($input);
        // 获取金额和天数
        $order = Input::only('pid','username');
        $order['aid'] = Ad::orderBy('aid','desc')->max('aid');
        $order['o_time'] = $input['ad_ctime'];
        $order['num'] = $input['ad_num'];
        $order['price'] = $input['ad_price'];

        $res = Ad_order::create($order);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re && $res){
            $content = '添加一条广告: '.$input['ad_name'];
            Admin_log::dolog($content);
            return redirect('admin/ad');
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
     * 获取修改的数据记录
     *
     * 返回修改页面
     *
     */
    public function edit(Request $request,$id)
    {
        // 根据传入的要修改的记录的ID 获取广告记录
        $adPosition = Ad_position::all();

        $data = Ad::find($id);
        $res = Ad_order::where('aid',$id)->first();
        $session = $request->session()->get('user');
//        dd($res);

//        将文章记录传给修改界面
        return view('admin.ad.adEdit',compact('adPosition','data','res','session'));
    }

    /**
     * 获取要修改的数据
     *
     * 执行修改
     *
     *
     */
    public function update(Request $request, $id)
    {
        //根据id获取修改记录
        $art = Ad::find($id);
        //根据请求传过来的参数获取到要修改成的记录
        $input = Input::except('_token','_method','file_upload','num','price');
        $input['ad_ctime'] = time();
        //更新
        $re = $art->update($input);

        $order = Ad_order::where('aid',$id)->first();
        $orders = Input::only('pid','username','num','price');
        $res = $order->update($orders);
        //如果成功跳转到列表页  失败返回修改页
        if($re && $res){
            $content = '修改一条广告: 编号'.$id;
            Admin_log::dolog($content);
            return redirect('admin/ad');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除广告数据
     *
     *
     *
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  Ad::where('aid',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $content = '删除一条广告: 编号'.$id;
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
