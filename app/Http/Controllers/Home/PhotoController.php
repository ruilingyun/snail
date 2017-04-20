<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class photoController extends Controller
{
    //上传相册
    public function photos(Request $request)
    {
        $iconname = md5(time()).'.jpg';
        $request->file('face')->move('home/photo',$iconname);
        $data = array_merge($request->only('name', 'desc', 'display'),['uid'=>Auth::user()->id],['time'=>date('Y-m-d H:i:s')],['face'=>'home/photo'.'/'.$iconname]);
         DB::table('photos')->insert($data);

        return redirect('home/personalImages');
    }

    //照片列表
    public function photolist()
    {
//        $result = DB::select('select * from photos where id ='.$id);
        $result = DB::select('select * from photos');
        return view('home/photoList')->with('result',$result);
    }
//    上传照片
    public function upphoto(Request $request)
    {
//        dd($id);
//        dd($_FILES);
        $iconname = md5(time()).'.jpg';
        $request->file('pic')->move('home/photo',$iconname);
//        dd($request->id);
        $dat = 'home/photo'.'/'.$iconname;
//        $pid = $request->id;
//        dd($uid);
        $time = date('Y-m-d H:i:s');
        $data=[
            'pic'=>$dat,
            'pid'=>$request->id,
            'created_at'=>$time,
        ];
        $result = DB::table('photolist')->insert($data);
//        return redirect('home/ee');
    }
//    public function aa()
//    {
//        return view('home/photoList');
//    }

}
