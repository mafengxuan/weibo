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


    //后台企业用户 company
    Route::resource('company','CompanyController');
    Route::get('companynotaudited','CompanyController@notaudited');


    //后台商业用户 commerce
    Route::resource('commerce','CommerceController');
    Route::get('commercenotaudited','CommerceController@notaudited');

    //后台大V用户 bigv
    Route::resource('bigv','BigvController');
    Route::get('bigvnotaudited','BigvController@notaudited');



    //后台微博管理
    Route::resource('microblog','MicroblogController');
    //后台评论管理
    Route::resource('comment','CommentController');
    //后台回复管理
    Route::resource('reply','ReplyController');
    //后台导航管理
    Route::resource('navigation','NavigationController');



    //后台广告管理
    Route::resource('ad','AdController');
    //后台广告位管理
    Route::resource('adPosition','AdPositionController');
    //后台广告审核
    Route::resource('audit','AuditController');
});

