<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
       Mail::send($view, $data, function ($m) use ($subject,$user) {
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
}
