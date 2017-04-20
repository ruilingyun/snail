<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use App\Http\Requests\Home\DoPush;
use App\Http\Requests\Home\UserCommentRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Msg;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function register()
    {
        return view('home.register');
    }

    // 保存用户的信息
    public function store(UserRegisterRequest $request)
    {
        $confirmed_code = str_random(10);
        $data = [
            'avatar' => 'home/image/default.jpg',
            'confirmed_code' =>$confirmed_code,
        ];
        $user = User::create(array_merge($request->all(),$data));
        // 发送邮件

        $view = 'home.emailConfirmed';
        $subject = '请验证邮箱';
        $this->sendEmail($user,$view,$subject,$data);
        return redirect('/home/index');

    }

    public function sendEmail($user,$view,$subject,$data)
    {
<<<<<<< HEAD
      Mail::send($view, $data, function ($m) use ($subject,$user) {
=======
//        dd($user->all());
        Mail::send($view, $data, function ($m) use ($subject,$user) {
>>>>>>> a4e4ecda2533c84d35e134fb6488c569ed266aca
            $m->to($user->email)->subject($subject);
        });
    }

    public function emailConfirm($code)
    {
        $user = User::where('confirmed_code', $code)->first();
        if (is_null($user)){
            return redirect('/home/register');
        }
        $user->confirmed_code = str_random(10);
        $user->confirmed = 1;
        $user->save();
        return redirect('/home/index');
    }

    // 发微博
    public function pushMsg()
    {
        //根据模型将所以的数据查询出来
        $msg =Msg::where('id','>','0')->orderBy('id','desc')->get();
        $comment =Comment::where('id','>','0')->orderBy('id','desc')->get();
        while($msg){
            return view('home.login-index',compact('msg','comment'));
//            return view('home.login-index', compact('msg'));

        }
    }

    public function doPush(DoPush $request)
    {
        $user = Auth::user()->id;
        $txt=$request->input('content'); //获取提交的数据
        $txt= htmlspecialchars(stripslashes($txt));
        //   $txt=mysql_real_escape_string(strip_tags($txt),$link); //过滤HTML标签，并转义特殊字符
        if( mb_strlen($txt)<1 ||  mb_strlen($txt)>140){
            return back();
        }
        $users_id=$user;
        //插入数据到数据表中
        $data=[
            'users_id'=>$users_id,
        ];
        Msg::create(array_merge($request->all(),$data));
        return redirect('home/login-index');
    }

    public function delMsg($id)
    {
        // 获取微博模型
        $msg = Msg::find($id);
        $msg->delete();
        return redirect('home/login-index');
    }

    // 微博评论
    public function doComment(UserCommentRequest $request)
    {
        $user = Auth::user()->id;
        $txt=$request->input('commit_content'); //获取提交的数据
//        dd($txt);
        $txt= htmlspecialchars(stripslashes($txt));
        //   $txt=mysql_real_escape_string(strip_tags($txt),$link); //过滤HTML标签，并转义特殊字符
        if( mb_strlen($txt)<1 ||  mb_strlen($txt)>140){
//            return  alert('输入合理的字数');
            return back();
        }
        $users_id=$user;
        //插入数据到数据表中
        $say_id = $request->input('say_id');
        $data=[
            'users_id'=>$users_id,
            'commit_users_id'=>$users_id,
            'say_id'=>$say_id,
        ];
        Comment::create(array_merge($request->all(),$data));

        return redirect('home/login-index');
    }

    // 删除微博
    public function delCom($id)
    {
        // 获取模型
        $com = Comment::find($id);
        $com->delete();
        return redirect('home/login-index');
    }

}
