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
        $data = array_merge($request->only('name', 'desc', 'display'),['uid'=>Auth::user()->id],['time'=>date('Y-m-d')],['face'=>'home/photo'.'/'.$iconname]);
         DB::table('photos')->insert($data);
        return redirect('home/personalImages');
    }

    //照片列表
    public function photolist($id)
    {
        $result = DB::select('select * from photolist where pid ='.$id);
//         $result = DB::select('select * from photos');

        return view('home/photoList',compact('result','id'));
    }
//    上传照片
    public function upphoto(Request $request)
    {
        $iconname = md5(time()).'.jpg';
        $request->file('pic')->move('home/photo',$iconname);
        $dat = 'home/photo'.'/'.$iconname;

        $time = date('Y-m-d H:i:s');
        $pid = $request->id;
        $data=[
            'pic'=>$dat,
            'pid'=>$pid,
            'created_at'=>$time,
        ];
        $result = DB::table('photolist')->insert($data);
        return redirect('home/photoList'.'/'.$pid);
    }

}
