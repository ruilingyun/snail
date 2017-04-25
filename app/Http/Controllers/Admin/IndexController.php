<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use App\Http\Controllers\Admin\PermissoionController;

class IndexController extends Controller
{
<<<<<<< HEAD

//    后台首页
    public function index()
=======
    //    后台首页
    public function index()
    {
        return view('admin/index');
    }

    //
    public function showLogin()
>>>>>>> 1221022da6f5879db6cf48e6083eaf7407927a92
    {
        return view('admin/index');
    }

//     进入登录页面
    public function showLogin()
    {
        return view('admin/login');
    }

//    后台登录
    public function doLogin(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => '用户邮箱不能为空',
            'email.exists' => '用户邮箱不存在',
            'password.required' => '密码不能为空',
        ];

        $this->validate($request, $rules, $messages);
//        dd(1);
        // 查询登录者信息

        $result = DB::table('users')
            ->where('email', $request->email)
            ->get();
//        dd($result);
        foreach ($result as $v) {
            $pass = $v->password;
            // 获取登录者id
            $user_id = $v->id;
            $user_name = $v->name;
        }
//        dd($request->password);
//        dd($user_id);
//      判断是否是超级管理员或管理员
        $res = DB::table('roles')
            ->leftJoin('role_user', 'roles.id', 'role_user.role_id')
            ->get();
//            dd($res->all());

        $arr = array();
        foreach ($res as $v) {
            $name = $v->display_name;
//            dd($name);
//            dd($v->user_id);

            if ($v->display_name == '管理员' || $v->display_name == '超级管理员') {
                // 获取超级管理员和管理员在users表中的 id
                $arr[] = $v->user_id;
            }
//            dd($arr);
        }
//        dd($user_id);
        if (!in_array($user_id, $arr)) {
            $messages = '用户不是管理员或超级管理员';
//            $err = 1;
//            dd($messages);
            return view('admin/login', compact('messages'));
        }
<<<<<<< HEAD
//        dd($user_name);
        // 如果允许登录则对密码进行hash 比较，判断密码是否正确
        if (Hash::check($request->password,$pass)){
//            dd('正确');
        //  如果密码正确则将 登录者 name 和 id 存入session
            session(['adminName' => $user_name, 'adminUserId'=>$user_id]);
//            dd(session()->get('adminName'));
//            dd($_SESSION);
            return view('admin/index');
        }else{
//            dd('错误');
             $messages =  '为密码错误';
//            $err ='0';
            return view('admin/login',compact('err'));
=======
        if (Hash::check($pass, $repass)) {
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            return redirect('admin/index');
>>>>>>> 1221022da6f5879db6cf48e6083eaf7407927a92
        }
        return redirect('admin/login');
    }

    public function outLogin()
    {
        //验证是否登录
        if(empty(session()->get('adminName'))){
            $err = 2;
            return view('admin/login', compact('err'));
        }

        session()->forget('adminName');
        session()->forget('adminUserId');
//        dd(session()->get('adminUser'));
        return redirect('admin/login');
    }
}



