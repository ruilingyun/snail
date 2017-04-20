<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\UserLoginRequest;
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
        $result= DB::table('userxq')->where('uid','24')->orderBy('id','desc')->get()->first();
//        dd(  $result);
        return view('home/personalCenter')->with('result',$result);
    }
//    个人相册
    public function personalImages()
    {
//        $result= DB::table('photolist')->where('uid','24')->get();
//        dd($result);
//        return view('home/personalImages')->with('result',$result);
        return view('home/personalImages');
    }

    public function personalManger()
    {
        return view('home/personalManger');
    }

    //前台首页控制器
    public function index()
    {
        return view('Home/index');
    }
    //前台登陆后首页
    public function loginindex()
    {
        return view('Home/login-index');
    }

    //前台登录
    public function showLogin()
    {
        return view('home.login');
    }

    public function doLogin(UserLoginRequest $request)
    {
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
    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('home/index');
    }

}
