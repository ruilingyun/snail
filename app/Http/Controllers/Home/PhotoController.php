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
//        dd($id);
        $result = DB::select('select * from photolist where pid ='.$id);
        $aid = Auth::user()->id;
        $resu= DB::table('userxq')->where('uid',$aid)->orderBy('id','desc')->get()->first();
        $data = DB::table('user_grade')->where('user_id',$aid)->get();
//         $result = DB::select('select * from photos');
        return view('home/photoList',compact('result','id'))->with('resu',$resu)->with('data',$data);
    }
//    上传照片
    public function upphoto(Request $request)
    {
//dd($id);
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
    //删除相册
    public function delPhotos($id)
    {
//        dd($id);
        DB::table('photos')->where('id', '=', $id)->delete();
        DB::table('photolist')->where('pid', '=', $id)->delete();
        return redirect('home/personalImages');
    }
    //删除照片
    public function delPhoto($id)
    {
//        dd($id);
        DB::table('photolist')->where('id', '=', $id)->delete();
        return redirect('home/personalImages');

    }
    //修改相册
    public function upphotos(Request $request,$id)
    {

        $iconname = md5(time()).'.jpg';
        $request->file('face')->move('home/photo',$iconname);
        $data = array_merge($request->only('name', 'desc', 'display'),['uid'=>Auth::user()->id],['time'=>date('Y-m-d')],['face'=>'home/photo'.'/'.$iconname]);
        DB::table('photos')->update($data);
        return redirect('home/personalImages');
    }

}
