<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //    后台首页
    public function index()
    {
        return view('admin/index');
    }

    //
    public function showLogin()
    {
        return view('admin.login');
    }

    public function rolelist()
    {
        return view('admin/rolelist');
    }

    public function doLogin(AdminLoginRequest $request)
    {
        $pass = $request->password;
        $res = DB::table('users')->where('email', $request->email)->get();
        foreach ($res as $v) {
            $repass = $v->password;
        }
        if (Hash::check($pass, $repass)) {
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            return redirect('admin/index');
        }
        return redirect('admin/login');
    }

}
