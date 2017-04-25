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
    return redirect('home/index');
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
//前台首页控制器
//登录后路由
Route::get('home/login-index', 'Home\IndexController@loginindex');
//个人中心主页路由
Route::get('home/personalCenter', 'Home\IndexController@pushMsg');
Route::get('home/personalCenter', 'Home\IndexController@personalCenter');

//个人中心相册路由
Route::get('home/personalImages', 'Home\IndexController@personalImages');
//个人中心管理路由
Route::get('home/personalManger', 'Home\IndexController@personalManger');
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

//前台个人设置
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

// 前台个人中心
Route::get('home/personalCenter', 'HOME\IndexController@personalCenter');
Route::get('home/personalImages', 'HOME\IndexController@personalImages');
Route::get('home/personalManger', 'HOME\IndexController@personalManger');

//前台微博关注
Route::get('home/other_per/{id}','Home\UserController@other_per'); //其他用户个人主页
Route::get('home/vip_follow','Home\UserController@vip_follow');//关注页面
Route::get('home/guanzhu/{id}','Home\UserController@guanzhu'); //关注
Route::get('home/nozhu/{id}','Home\UserController@nozhu'); //取消关注

// 粉丝列表
Route::get('home/vip_fans', 'Home\IndexController@vip_fans');
// 关注列表
Route::get('home/vip_follow', 'Home\IndexController@vip_follow');

//发微博
Route::get('home/login-index', 'Home\UserController@pushMsg');
Route::post('home/login-index', 'Home\UserController@doPush');
// 删除微博
Route::get('home/delMsg/{id}', 'Home\UserController@delMsg');
// 评论
Route::post('home/comment', 'Home\UserController@doComment');
Route::get('home/delCom/{id}', 'Home\UserController@delCom');
// 回复
Route::post('home/reply', 'Home\UserController@doReply');






// 后台登录
Route::get('admin/login', 'Admin\IndexController@showLogin');
Route::post('admin/doLogin', 'Admin\IndexController@doLogin');

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

// 链接管理
Route::get('admin/link-list', 'Admin\LinkController@linkList');
// 添加链接
Route::any('admin/link-add', 'Admin\LinkController@linkAdd');
// 修改链接
Route::any('admin/link-update/{id}', 'Admin\LinkController@linkUpdate');
Route::post('admin/doLink', 'Admin\LinkController@doUpdate');
// 删除链接
Route::get('admin/link-delete/{id}', 'Admin\LinkController@linkDelete');
