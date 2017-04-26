<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
//    新闻详情
    public function newdetail($id)
    {
        $result = DB::table('new')->where('id', $id)->get();
//       dd($result);
        return view('home/newdetail', compact('result'));
    }
}
