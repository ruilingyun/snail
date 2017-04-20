<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //
    public function showLogin()
=======
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
>>>>>>> a4e4ecda2533c84d35e134fb6488c569ed266aca
    {
        return view('admin.login');
    }

    public function doLogin(AdminLoginRequest $request)
    {
        dd(1);
        $pass = $request->password;
        $res = DB::table('users')->where('email',$request->email)->get();
        foreach ($res as $v){
            $repass = $v->password;
        }
        if(Hash::check($pass,$repass)){
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            return redirect('admin.index');
        }
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
