<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台登录页
Route::get('/admin/login','Admin\LoginController@login');
//处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');

//验证码路由
Route::get('/admin/code','Admin\LoginController@code');

//后台模块
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
    //后台主页面
    Route::resource('index', 'IndexController');
    //后台欢迎页
    Route::get('welcome','IndexController@welcome');

    //管理员日志
    Route::get('log','LogController@index');

    //后台企业用户
    Route::resource('company','CompanyController');
});


