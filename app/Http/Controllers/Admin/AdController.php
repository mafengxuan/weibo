<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Ad_position;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdController extends Controller
{
    public function upload()
    {

//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
//            将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);
//        返回文件的上传路径
            $filepath = 'uploads/' . $newName;
            return $filepath;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 根据keywords搜索
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            $data = Ad::where('ad_name','like','%'.$key.'%')->paginate(10);
            $status = array(1=>'已发布',2=>'未发布');
            return view('admin/ad/index',['data'=>$data,'status'=>$status,'key'=>$key]);
        }else{
            $key = '';
            // 获取所有数据
            $data = Ad::orderBy('aid','asc')->paginate(10);
            $status = array(1=>'已发布',2=>'未发布');

            //添加到列表页
            return view('admin/ad/index',['data'=>$data,'status'=>$status,'key'=>$key]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adPosition = Ad_position::all();

        return view('admin.ad.addAd',compact('adPosition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  获取请求中的所有数据，除了_token  file_upload
        $input = Input::except('_token','file_upload','num','price');
        $adOrder = Ad_order::orderBy('oid','desc')->max('oid');
        $input['oid'] = $adOrder+1;
        $input['a_time'] = $input['ad_ctime'];
        //        通过ad模型的create  or   save 添加到数据库
        $re = Ad::create($input);
        // 获取金额和天数
        $order = Input::only('pid','username','num','price');
        $order['aid'] = Ad::orderBy('aid','desc')->max('aid');
        $order['o_time'] = $input['ad_ctime'];

        $res = Ad_order::create($order);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re && $res){
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 根据传入的要修改的记录的ID 获取广告记录
        $adPosition = Ad_position::all();

        $data = Ad::find($id);
        $res = Ad_order::where('aid',$id)->first();
//        dd($res);

//        将文章记录传给修改界面
        return view('admin.ad.adEdit',compact('adPosition','data','res'));
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
        $art = Ad::find($id);
        //根据请求传过来的参数获取到要修改成的记录
        $input = Input::except('_token','_method','file_upload','num','price');
        //更新
        $re = $art->update($input);

        $order = Ad_order::where('aid',$id)->first();
        $orders = Input::only('pid','username','num','price');
        $res = $order->update($orders);
        //如果成功跳转到列表页  失败返回修改页
        if($re && $res){
            return redirect('admin/ad');
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
        //删除对应id的用户
        $re =  Ad::where('aid',$id)->delete();
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
