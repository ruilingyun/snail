<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class myMasscontroller extends Controller
{
    //个人资料
    //上传资料
    public function setmass(Request $request)
    {
        $data = array_merge($request->only( 'iname', 'sex', 'date', 'notice', 'QQ','phone'),['uid'=>Auth::user()->id]);
//        $res = DB::table('userxq')->get()->first()->id;
//        dd($res);
//        if (empty(DB::table('userxq')->get()->first()->uid)){
        $result = DB::table('userxq')->insert($data);
//        }
//        $result = DB::table('userxq')->update($data);

        return redirect('home/myMass');
    }



}
