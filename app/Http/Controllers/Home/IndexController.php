<?php

namespace App\Http\Controllers\Home;

<<<<<<< HEAD
use App\Http\Requests\Home\UserLoginRequest;
use App\Msg;
=======
use App\Comment;
use App\Follow;
use App\Http\Requests\Home\UserLoginRequest;
use App\Links;
use App\Msg;
use App\Reply;
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
<<<<<<< HEAD
//    前台首页
    public function index()
    {
        $result = DB::table('new')->where('is_hot', 1)->get();
//        dd($result);
        $advert = DB::table('advert')->where('status', 1)->get()->toArray();

        $goods = DB::table('goods')->where('status', 1)->get();
        return view('home/index', compact('result', 'advert', 'goods'));
    }


=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    // 个人中心
    public function personalCenter()
    {
        $id = Auth::user()->id;
        $resu= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();
        $data = DB::table('user_grade')->where('user_id',$id)->get();
<<<<<<< HEAD
//        $users = DB::table('users')->where('uid','24')->orderBy('id','desc')->get();
//        dd($result);
        return view('home/personalCenter')->with('resu',$resu)->with('data',$data);
    }
=======
        $zan = DB::table('zan')->where('zanuser_id',$id)->orderBy('id','desc')->get();
        $count_zan =count($zan);
        $result = DB::select('select * from user_grade where user_id ='.$id );

        if (empty($result)){
            $data=[
                'user_id'=>$id,
                'grade'=>1,
            ];
//            dd($data);
            DB::table('user_grade')->insert($data);
        }

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
        return view('home/personalCenter')->with('result',$result)->with('msg',$msg)->with('comment',$comment)->with('reply', $reply)->with('users',$users)->with('count_weibo', $count_weibo)->with('count_fans',$count_fans)->with('count_fans1',$count_fans1)->with('resu',$resu)->with('data',$data)->with('count_zan',$count_zan);
    }


>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    // 个人相册
    public function personalImages()
    {
        $id = Auth::user()->id;
<<<<<<< HEAD
        $result= DB::table('photos')->get();
        $data = DB::table('user_grade')->where('user_id',$id)->get();
        $resu= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();

//        dd($result);
        return view('home/personalImages')->with('result',$result)->with('data',$data)->with('resu',$resu);
=======
        $result1= DB::table('photos')->where('uid','=',$id)->get();
        $data = DB::table('user_grade')->where('user_id',$id)->get();
        $resu= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();

//        --------

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
//        dd($result);
        return view('home/personalImages')->with('result1',$result1)->with('data',$data)->with('resu',$resu)->with('msg',$msg)->with('count_fans',$count_fans)->with('count_fans1',$count_fans1)->with('count_weibo',$count_weibo)->with('comment',$comment)->with('result',$result);
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

    }


    public function personalManger()
    {
        return view('home/personalManger');
    }

<<<<<<< HEAD
=======
    public function index()
    {
        $link = Links::where('id','>','0')->orderBy('id')->get();

//        dd($link);
        return view('home.index', compact('link'));
    }
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

    //前台登录
    public function showLogin()
    {
        return view('home.login');
    }

    public function doLogin(UserLoginRequest $request)
    {
        $pass = $request->password;
<<<<<<< HEAD
         $res = DB::table('users')->where('email',$request->email)->get();
=======
        $email = $request->email;
        $res = DB::table('users')->where('email',$email)->get();
        $resu = $res->toArray();
        if(empty($resu)){
            return back();
        }
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        foreach ($res as $v){
            $repass = $v->password;
        }
        if(Hash::check($pass,$repass)){
<<<<<<< HEAD
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //邮箱判断
        $result = User::where('email',$request->input('email'))->get()->toArray();
//        dd($result[0]['confirmed']);
        if ($result[0]['confirmed'] == 0) {
            return back();
        }
//        dd($news);
=======
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            //邮箱判断
            $result = User::where('email',$request->email)->get()->toArray();
            if ($result[0]['confirmed'] == 0) {
                return back();
            }
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
            return redirect('home/login-index');
        }
        return redirect('home/index');

    }
    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/home/index');
    }

<<<<<<< HEAD
//    广告轮播图
    public function adv(){
        $advert = DB::table('advert')->where('status', 1)->get();
        return view('home/lunbotu', compact('advert'));
    }

//     百度地图接口
    public function baidu()
    {
        return view('home/baiduditu');
=======
    // 粉丝页
    public function vip_fans()
    {
        $follow = Follow::where('id','>','0')->get();
        $users = User::where('id','>','0')->get();

        return view('home.vip_fans',compact('follow','users'));
    }

    public function vip_follow()
    {
        $follow = Follow::where('id','>','0')->get();
        $users = User::where('id','>','0')->get();

        return view('home.vip_follow',compact('follow','users'));
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    }

}
