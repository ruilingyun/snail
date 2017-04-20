<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class myuserController extends Controller
{
    //好友管理
    public function myuser()
    {
        return view('home/myuser');
    }
    //粉丝管理
    public function myfans()
    {
        return view('home/myfans');
    }
}
