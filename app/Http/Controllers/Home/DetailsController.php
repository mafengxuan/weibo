<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    /**
     * 详情页
     *
     *
     */
    public function index()
    {
        $data = [];
        return view('home.details.index',compact('data'));
    }


}
