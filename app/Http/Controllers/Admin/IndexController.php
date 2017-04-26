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

//    后台首页
    public function index()
    {

        //验证是否登录
        if(empty(session()->get('adminName'))){
            $messages =  "<script>alert('请登录后浏览!')</script>";
            return view('admin/login', compact('messages'));
        }
        $messages = "";

        return view('admin/index', compact('messages'));
    }

//     进入登录页面
    public function showLogin()
    {
        $messages = '';
        return view('admin/login',compact('messages'));
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
            $messages = "<script>alert('后台重地,闲人免进!')</script>";
            return view('admin/login', compact('messages'));
        }
//        dd($user_name);
        // 如果允许登录则对密码进行hash 比较，判断密码是否正确
        if (Hash::check($request->password,$pass)){
//            dd('正确');
        //  如果密码正确则将 登录者 name 和 id 存入session
            session(['adminName' => $user_name, 'adminUserId'=>$user_id]);
//            dd(session()->get('adminName'));
//            dd($_SESSION);
            $messages = '';
            return view('admin/index', compact('messages'));
        }else{
//            dd('错误');
             $messages =  "<script>alert('密码错误!')</script>";
            return view('admin/login',compact('messages'));
        }
    }

    public function outLogin()
    {
        //验证是否登录
        if(empty(session()->get('adminName'))){
            $messages = "<script>alert('先登录 行?')</script>";
            return view('admin/login', compact('messages'));
        }

        session()->forget('adminName');
        session()->forget('adminUserId');
//        dd(session()->get('adminUser'));
        return redirect('admin/login');
    }
}



