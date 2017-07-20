<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Attention;
use App\Http\Model\Collect;
use App\Http\Model\Microblog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends CommonindexController
{
    /**
     * 收藏页
     */
    public function collectindex()
    {
//        $data = Collect::where('uid',session('user_home')->uid)->get();
        $data = Collect::where('uid',session('user_home')->uid)->get();
        $data = $data->toArray();
        $ids = [];
        foreach($data as $k => $v){
            $ids[] = $v['mid'];
        }


        $microblog = Microblog::whereIn('mid', $ids)->join('user_commons','microblogs.uid','=','user_commons.uid')->orderBy('ctime','desc')->get();

        return view('home.details.collect',compact('microblog'));
    }

    /**
     * 关注页
     */
    public function attentionindex()
    {
        $data = Attention::where('uid',session('user_home')->uid)->get();
        $data = $data->toArray();
        $ids = [];
        foreach($data as $k => $v){
            $ids[] = $v['attention_id'];
        }

        $microblog = Microblog::whereIn('microblogs.uid', $ids)->join('user_commons','microblogs.uid','=','user_commons.uid')->orderBy('ctime','desc')->get();

        return view('home.details.collect',compact('microblog'));
    }




}
