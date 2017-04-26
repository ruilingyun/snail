<?php

namespace App\Http\Controllers\Home;

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
//    前台首页
    public function index()
    {
        $result = DB::table('new')->where('is_hot', 1)->get();
//        dd($result);
        $advert = DB::table('advert')->where('status', 1)->get()->toArray();

        $goods = DB::table('goods')->where('status', 1)->get();
        return view('home/index', compact('result', 'advert', 'goods'));
    }


    // 个人中心
    public function personalCenter()
    {
        $id = Auth::user()->id;
        $resu= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();
        $data = DB::table('user_grade')->where('user_id',$id)->get();
//        $users = DB::table('users')->where('uid','24')->orderBy('id','desc')->get();
//        dd($result);
        return view('home/personalCenter')->with('resu',$resu)->with('data',$data);
    }
    // 个人相册
    public function personalImages()
    {
        $id = Auth::user()->id;
        $result= DB::table('photos')->get();
        $data = DB::table('user_grade')->where('user_id',$id)->get();
        $resu= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();

//        dd($result);
        return view('home/personalImages')->with('result',$result)->with('data',$data)->with('resu',$resu);

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
//        dd($result[0]['confirmed']);
        if ($result[0]['confirmed'] == 0) {
            return back();
        }
//        dd($news);
            return redirect('home/login-index');
        }
    }
    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/home/index');
    }

//    广告轮播图
    public function adv(){
        $advert = DB::table('advert')->where('status', 1)->get();
        return view('home/lunbotu', compact('advert'));
    }

//     百度地图接口
    public function baidu()
    {
        return view('home/baiduditu');
    }

}
