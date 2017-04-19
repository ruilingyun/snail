<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UserLoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
//        DB
        $pass = $request->password;
//        $pass = Hash::make($pass);
        $res = DB::table('users')->where('email',$request->email)->get();
        foreach ($res as $v){
            $repass = $v->password;
        }
        if(Hash::check($pass,$repass)){
//            dd(11);

//        dump($pass);
//        dd($repass);
//        dd($request->all());
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            //邮箱判断
            $result = User::where('email',$request->input('email'))->get()->toArray();
            if ($result[0]['confirmed'] == 0) {
                return back();
            }
            return redirect('home/login-index');
        }
    }
}
