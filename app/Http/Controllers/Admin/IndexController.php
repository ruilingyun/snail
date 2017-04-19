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
