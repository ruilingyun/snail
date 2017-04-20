<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Home\DoPush;
use App\Http\Requests\Home\UserLoginRequest;
use App\Msg;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
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

    //前台登录
    public function showLogin()
    {
        return view('home.login');
    }

    public function doLogin(UserLoginRequest $request)
    {
        $pass = $request->password;
         $res = DB::table('users')->where('email',$request->email)->get();
        foreach ($res as $v){
            $repass = $v->password;
        }
        if(Hash::check($pass,$repass)){
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //邮箱判断
        $result = User::where('email',$request->input('email'))->get()->toArray();
        if ($result[0]['confirmed'] == 0) {
            return back();
        }
        return redirect('home/login-index');
        }
    }
    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/home/index');
    }

}
