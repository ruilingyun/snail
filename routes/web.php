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
    return view('welcome');
});


//前台首页控制器
//登录后路由
Route::get('home/login-index', 'Home\IndexController@loginindex');
//个人中心主页路由
Route::get('home/personalCenter', 'Home\IndexController@personalCenter');
//个人中心相册路由
Route::get('home/personalImages', 'Home\IndexController@personalImages');
//个人中心管理路由
Route::get('home/personalManger', 'Home\IndexController@personalManger');

// 后台登录
Route::get('admin/login', 'Admin\IndexController@showLogin');
Route::post('admin/doLogin', 'Admin\IndexController@doLogin');



//前台首页
Route::get('home/index','Home\IndexController@index');

// 前台登录
Route::get('home/showLogin', 'Home\IndexController@showLogin');
Route::post('home/doLogin', 'Home\IndexController@doLogin');
// 前台注册
Route::get('home/register', 'Home\UserController@register');
Route::post('home/store', 'Home\UserController@store');
Route::get('verify/{confirmed_code}', 'Home\UserController@emailConfirm');
//前台个人中心
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

//后台首页控制器
Route::get('admin/index','Admin\IndexController@index');


//权限管理
Route::get('admin/permission-list', 'Admin\PermissionController@permissionList');
Route::any('admin/permission-add', 'Admin\PermissionController@permissionadd');
Route::any('admin/permission-update/{permission_id}', 'Admin\PermissionController@permissionupdate');
Route::get('admin/permission-delete/{permission_id}', 'Admin\PermissionController@permissiondelete');


//角色管理
Route::get('admin/role-list', 'Admin\RoleController@roleList');
Route::any('admin/role-add', 'Admin\RoleController@roleadd');
Route::any('admin/role-update/{role_id}', 'Admin\RoleController@update');
Route::get('admin/role-delete/{role_id}', 'Admin\RoleController@roledelete');
Route::any('admin/allot-permission/{role_id}', 'Admin\RoleController@allotpermission');


//管理员管理
Route::get('admin/user-list', 'Admin\UserController@userList');
Route::any('admin/user-add', 'Admin\UserController@useradd');
Route::any('admin/user-update/{user_id}', 'Admin\UserController@userupdate');
Route::any('admin/user-delete/{user_id}', 'Admin\UserController@userdelete');
Route::any('admin/allot-role/{user_id}', 'Admin\UserController@allotrole');


//前台首页
Route::get('home/index','Home\IndexController@index');

// 前台登录
Route::get('home/showLogin', 'Home\IndexController@showLogin');
Route::post('home/doLogin', 'Home\IndexController@doLogin');
//退出登录
Route::get('home/logout','Home\IndexController@logout');
// 前台注册
Route::get('home/register', 'Home\UserController@register');
Route::post('home/store', 'Home\UserController@store');
Route::get('verify/{confirmed_code}', 'Home\UserController@emailConfirm');
//前台个人中心
//账号设置->个人信息
Route::get('home/myMass','Home\accountController@myMass');
//修改昵称
Route::get('home/name-update/{role_id}', 'Home\accountController@userupdate');
//修改密码
Route::any('home/pwd-update/{role_id}', 'Home\accountController@setpwd');
//修改头像
Route::any('home/icon-update/{role_id}', 'Home\accountController@iconupdate');
//修改密码
Route::any('home/pwd-update/{role_id}', 'Home\accountController@doPassword');


//头像
Route::get('home/icon','Home\accountController@icon');
//隐私设置
Route::get('home/privacy','Home\accountController@privacy');
//消息设置
Route::get('home/news','Home\accountController@news');
//隐私设置
Route::get('home/screen','Home\accountController@screen');



// 后台登录
Route::get('admin/login', 'Admin\UserController@showLogin');
Route::post('admin/login', 'Admin\UserController@doLogin');



//上传照片
Route::post('home/photolist','Home\PhotoController@upphotos');

//个人资料
//上传资料
Route::post('home/setmass','Home\myMassController@setmass');
//修改资料
Route::post('home/resetmass','Home\myMassController@resetmass');


//上传相册
Route::post('home/photos','Home\PhotoController@photos');
//照片列表
Route::get('home/photoList/{id}','Home\PhotoController@photolist');
//上传照片
Route::post('home/upphoto','Home\PhotoController@upphoto');


//用户管理
//普通用户
Route::get('admin/users-list', 'Admin\UsersController@userslist');
Route::get('admin/users-delete/{user_id}', 'Admin\UsersController@delete');
//vip用户
Route::get('admin/vip-list', 'Admin\VipController@viplist');
Route::get('admin/users-delete/{user_id}', 'Admin\VipController@delete');
//管理员
Route::get('admin/manager-list', 'Admin\ManagerController@managerlist');
Route::get('admin/users-delete/{user_id}', 'Admin\ManagerController@delete');
//超级管理员
Route::get('admin/super-list', 'Admin\SuperController@superlist');
Route::get('admin/users-delete/{user_id}', 'Admin\SuperController@delete');

//用户状态管理
Route::get('admin/start-users/{user_id}', 'Admin\UsersController@startusers');
Route::get('admin/forbidden-users/{user_id}', 'Admin\UsersController@forbiddenusers');



//新闻管理
Route::get('admin/msg-list', 'Admin\MsgController@msglist');
//添加新闻
Route::any('admin/msg-publish', 'Admin\MsgController@msgpublish');
//删除新闻
Route::get('admin/msg-delete/{id}', 'Admin\MsgController@msgdelete');
//修改新闻
Route::any('admin/msg-update/{id}', 'Admin\MsgController@msgupdate');

//新闻状态管理
Route::get('admin/is-hot/{id}', 'Admin\MsgController@ishot');
Route::get('admin/not-hot/{id}', 'Admin\MsgController@nothot');


//新闻分类列表
Route::get('admin/type-list' ,'Admin\TypeController@typelist');
//添加新闻分类
Route::any('admin/type-add', 'Admin\TypeController@typeadd');
//删除新闻分类
Route::get('admin/type-delete/{id}', 'Admin\TypeController@typedelete');

//前台好友管理
Route::get('home/myuser','Home\myuserController@myuser');
//粉丝
Route::get('home/myfans','Home\myuserController@myfans');
