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
    return view('home.index.index');
});

//后台登录页
Route::get('/admin/login','Admin\LoginController@login');

//处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');

//验证码路由
Route::get('/admin/code','Admin\LoginController@code');

//后台模块
//Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'], function(){
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){

    //后台主页面
    Route::resource('index', 'IndexController');
    //后台欢迎页
    Route::get('welcome','IndexController@welcome');
    //退出登录
    Route::get('quit','IndexController@quit');
    //修改密码
    Route::get('repass','PwdController@repass');
    Route::post('dorepass','PwdController@dorepass');
    //后台普通用户
    Route::resource('user','UserController');
    //后台管理员
    Route::resource('admin','AdminController');

    //管理员日志
    Route::get('log','LogController@index');


    //后台企业用户
    Route::resource('company','CompanyController');

    //后台微博管理
    Route::resource('microblog','MicroblogController');
    //后台评论管理
    Route::resource('comment','CommentController');
    //后台回复管理
    Route::resource('reply','ReplyController');
    //后台导航管理
    Route::resource('navigation','NavigationController');
    //后台内容详情管理
    Route::resource('content','ContentController');
    //后台标签管理
    Route::resource('label','LabelController');
    //后台热门管理
    Route::resource('hot','HotController');
    //后台每日热门管理
    Route::resource('hotcontent','HotcontentController');

    //后台时事热门管理
    Route::resource('currentevent','CurrenteventController');



    //后台广告管理
    Route::resource('ad','AdController');
    //后台广告位管理
    Route::resource('adPosition','AdPositionController');
    //后台广告审核
    Route::resource('audit','AuditController');
});


//前台模块
Route::group(['prefix'=>'home','namespace'=>'Home'], function() {

    //前台首页
    Route::get('index','IndexController@index');
});

