<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UserLoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
//    登录后首页
    public function loginindex()
    {
        return view('home/login-index');
    }

    //个人中心
    public function personalCenter()
    {
        return view('home/personalCenter');
    }

    public function personalImages()
    {
        return view('home/personalImages');
    }

    public function personalManger()
    {
        return view('home/personalManger');
    }

    //前台首页控制器
    public function index()
    {
        return view('home/index');
    }

    //前台登录
    public function showLogin()
    {
        return view('home.login');
    }

    public function doLogin(UserLoginRequest $request)
    {
//        dd($request->all());
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //邮箱判断
        $result = User::where('email',$request->input('email'))->get()->toArray();
        if ($result[0]['confirmed'] == 0) {
            return back();
        }
        return redirect('/home/register');
    }
}
