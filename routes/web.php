<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

//前台首页
Route::get('home/index','Home\IndexController@index');

// 前台登录
Route::get('home/showLogin', 'Home\IndexController@showLogin');
Route::post('home/doLogin', 'Home\IndexController@doLogin');
//退出登录
Route::get('/home/logout', 'Home\IndexController@logout');

// 前台注册
Route::get('home/register', 'Home\UserController@register');
Route::post('home/store', 'Home\UserController@store');
Route::get('verify/{confirmed_code}', 'Home\UserController@emailConfirm');
//前台个人设置
//账号设置->个人信息
Route::get('home/myMass','Home\accountController@myMass');
//头像
Route::get('home/icon','Home\accountController@icon');
//隐私设置
Route::get('home/privacy','Home\accountController@privacy');
//消息设置
Route::get('home/news','Home\accountController@news');
//隐私设置
Route::get('home/screen','Home\accountController@screen');

// 前台个人中心
Route::get('home/personalCenter', 'HOME\IndexController@personalCenter');
Route::get('home/personalImages', 'HOME\IndexController@personalImages');
Route::get('home/personalManger', 'HOME\IndexController@personalManger');

//发微博
Route::get('home/login-index', 'Home\UserController@pushMsg');
Route::post('home/login-index', 'Home\UserController@doPush');
// 删除微博
Route::get('home/delMsg/{id}', 'Home\UserController@delMsg');
// 评论
Route::post('home/comment', 'Home\UserController@doComment');
Route::get('home/delCom/{id}', 'Home\UserController@delCom');






// 后台登录
Route::get('admin/login', 'Admin\IndexController@showLogin');
Route::post('admin/doLogin', 'Admin\IndexController@doLogin');