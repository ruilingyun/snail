<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    {
        return view('admin/comment');
    }
//    状态管理
    public function status()
    {
        return view('admin/status');
    }
}
