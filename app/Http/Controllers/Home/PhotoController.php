<?php

namespace App\Http\Controllers\Home;

<<<<<<< HEAD
use App\Http\Requests;
=======
use App\Comment;
use App\Follow;
use App\Http\Requests;
use App\Msg;
use App\Reply;
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
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
<<<<<<< HEAD
=======

>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        $iconname = md5(time()).'.jpg';
        $request->file('face')->move('home/photo',$iconname);
        $data = array_merge($request->only('name', 'desc', 'display'),['uid'=>Auth::user()->id],['time'=>date('Y-m-d')],['face'=>'home/photo'.'/'.$iconname]);
         DB::table('photos')->insert($data);
        return redirect('home/personalImages');
    }

    //照片列表
    public function photolist($id)
    {
<<<<<<< HEAD
        $result = DB::select('select * from photolist where pid ='.$id);
//         $result = DB::select('select * from photos');

        return view('home/photoList',compact('result','id'));
=======
//        dd($id);
        $result1 = DB::select('select * from photolist where pid ='.$id);
        $aid = Auth::user()->id;
        $resu= DB::table('userxq')->where('uid',$aid)->orderBy('id','desc')->get()->first();
        $data = DB::table('user_grade')->where('user_id',$aid)->get();
//        ---
        $users = User::where('id','>','0')->get();
        $user_id = Auth::user()->id;
        $msg =Msg::where('users_id','=',$user_id)->orderBy('id','desc')->get();

        $comment =Comment::where('id','>','0')->orderBy('id','desc')->get();

        $follow = Follow::where('usersby_id','=',$id)->get();
        $follows = Follow::where('users_id','=',$id)->get();
        $users_id = DB::select('select * from msg where users_id = '.$id);
        $result= DB::table('userxq')->where('uid',$user_id)->orderBy('id','desc')->get()->first();
        $reply=Reply::where('id','>','0')->orderBy('id','desc')->get();
        $count_weibo = count($users_id);
        $count_fans = count($follow);
        $count_fans1 = count($follows);
//
        foreach ($msg as $v){
//            dd($v->id);
            $say_id = $v->id;
            $a =  DB::table('collect')
                ->where('collect_id',$say_id)
                ->get();
            $v->collectionNum = count($a);

        }
        foreach ($msg as $v){
            $say_id = $v->id;
//            dd($say_id);

            $b =  DB::table('zan')
                ->where('zan_id',$say_id)
                ->get();
            $v->is_zan = $b;
            $v->zanNum = count($b);
        }
        foreach ($msg as $v){
            $say_id = $v->id;

            $c =  DB::table('relay')
                ->where('msg_id',$say_id)
                ->get();
            $v->is_relay = $c;
            $v->relayNum = count($c);
        }
//         $result = DB::select('select * from photos');
        return view('home/photoList',compact('result1','id'))->with('resu',$resu)->with('data',$data)->with('msg',$msg)->with('count_fans',$count_fans)->with('count_fans1',$count_fans1)->with('count_weibo',$count_weibo)->with('comment',$comment)->with('result',$result);
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    }
//    上传照片
    public function upphoto(Request $request)
    {
<<<<<<< HEAD
=======
//dd($id);
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
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
<<<<<<< HEAD
=======
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
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

}
