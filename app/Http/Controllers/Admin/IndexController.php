<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Admin\PermissoionController;

class IndexController extends Controller
{

//    后台首页
    public function index(){
        return view('admin/index');
    }
    public function rolelist()
    {
        return view('admin/rolelist');


    }
//    后台相册
    public function image()
    {
        return view('admin/image');
    }
//    后台评论
    public function comment()
    {
        return view('admin/comment');
    }
//    状态管理
    public function status()
    {
        return view('admin/status');
    }



    public function showLogin()
    {
        return view('admin/login');
    }

    public function doLogin(AdminLoginRequest $request)
    {
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        return view('admin/index');
    }


}
