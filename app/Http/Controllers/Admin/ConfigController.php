<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Config::get();
        foreach ($res as $k=>$v){
            switch($v->field_type){
                case 'input':
                    $res[$k]->_content = '<input style="width:100%" type="text" name="conf_content[]" value="'.$v->conf_content.'">';
                break;
                case 'textarea':
                    $res[$k]->_content = '<textarea style="width:100%;" name="conf_content[]">'.$v->conf_content.'</textarea>';
                break;
                case 'radio':
                    $arr = explode('，',$v->field_value);
                    $str = '';
                    foreach($arr as $m=>$n){
                        $a = explode('|',$n);
                        $c = ($v->conf_content == $a[0]) ? ' checked': '';
                        $str.= '<input type="radio" name="conf_content[]"'.$c.' value="'.$a[0].'">'.$a[1];
                    }
                $res[$k]->_content = $str;
                    break;
            }
        }

        return view('admin/config/index',compact('res'));
        //return view('admin/config/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/config/add');
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
        $input = Input::except('_token');


        if($input['field_type'] != 'radio'){
            $input['field_value'] = '';
        }


        $res = Config::create($input);
        if($res){
            $content = '创建配置文件: '.$input['conf_title'];
            Admin_log::dolog($content);

            return redirect('admin/config');
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
        //
        $data = Config::find($id);

        return view('admin.config.edit',compact('data'));
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
        $data = $request->except('_token','_method');

        if($data['field_type'] != 'radio'){
            $data['field_value'] = '';
        }
        $res = Config::where('id',$id)->update($data);
        if($res){
            $content = '修改配置文件: '.$input['conf_title'];
            Admin_log::dolog($content);
            return redirect('admin/config');
        }else{
            return back()->with('error','修改失败')->withInput();
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

    public function del($id){
        $data = Config::find($id);
        $res = $data->delete();
        if($res){
            $content = '删除配置文件: '.$id;
            Admin_log::dolog($content);
            $data = [
                'status' => 0,
                'msg'    =>'配置删除成功'
            ];
        }else{
            $data = [
                'status' => 4,
                'msg'    =>'配置删除失败'
            ];
        }
        return $data;
    }

    public function change(Request $request){
        $data = $request->except('_token');
        foreach ($request['id'] as $k=>$v){
            Config::where('id',$v)->update(['conf_content'=>$request['conf_content'][$k]]);
        }
        $this->putfile();
        return redirect('admin/config');

    }

    public function putfile(){
        $res = Config::lists('conf_content','conf_name')->all();
        $str = '<?php return '.var_export($res,true).';';
        $path = base_path().'/config/web.php';
        file_put_contents($path,$str);
    }
}
