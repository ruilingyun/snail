<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

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
<<<<<<< HEAD
=======
    //点赞
    public function zan($id)
    {
//        dd($id);
        $zan_id = $id;
        $zanuser_id = Auth::user()->id;
//        dd($zanuser_id);
//        $zan=Zan::where('zanuser_id','=',$zanuser_id)->where('zan_id','=',$zan_id)->where()->get();
//        $zan = DB::table('zan')->where('zanuser_id',$zanuser_id)->where('zan_id',$zan)->select($grade);
//        dd($zan);
        $result = DB::table('zan')->where('zanuser_id',$zanuser_id)->where('zan_id',$zan_id)->get();

//        $result = DB::select('select * from zan where zan_id ='.$zan_id )->where('zanuser_id','=',$zanuser_id);
//        dd($result);
        if (empty($result[0])){
            $data=[
                'zan_id'=>$zan_id,
                'zanuser_id'=>$zanuser_id,
            ];
            DB::table('zan')->insert($data);
        }else{
//            DB::delete('delete from zan where zan_id = ?',array($zan_id));
            DB::table('zan')->where('zan_id',$zan_id)->where('zanuser_id',$zanuser_id)->delete();

        }
        return back();
    }
//    //展示赞 转发 微博
//    public function show()
//    {
//        $id = Auth::user()->id;
//        $zan_id = DB::table('zan')->where('zanuser_id','=',$id)->pluck('zan_id');
//        $resu1= DB::table('msg')->where('id','=',$zan_id)->get();
//
//        dd($resu1);
//        return view('home/show')->with('resu1',$resu1);
//    }
//模糊查询
    public function seach()
    {

    }
    //天气接口
    public function tianqi()
    {
        return view('home/tianqi');
    }
    //新闻接口
    public function xinwen()
    {
        return view('home/xinwen');
    }
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
}
