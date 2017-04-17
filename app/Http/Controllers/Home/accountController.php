<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class accountController extends Controller
{
    //前台个人中心
    public function myMass()
    {
        return view('Home/Personal/myMass');
    }
    //前台头像
    public function icon()
    {
        return view('Home/Personal/icon');
    }
    //隐私设置
    public function privacy()
    {
        return view('Home/Personal/privacySet');
    }
    //消息设置
    public function news()
    {
        return view('Home/Personal/newsSet');
    }
    //屏蔽设置
    public function screen()
    {
        return view('Home/Personal/screenSet');
    }
}
