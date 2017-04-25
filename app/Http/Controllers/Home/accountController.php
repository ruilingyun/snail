<?php

namespace App\Http\Controllers\Home;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class accountController extends Controller
{
    //前台个人中心
    public function myMass()
    {
        $id = Auth::user()->id;
        $result= DB::table('userxq')->where('uid',$id)->orderBy('id','desc')->get()->first();
//        dd(  $result);
        return view('Home/Personal/myMass')->with('result',$result);
    }
    //修改昵称
    public function userupdate(Request $request, $user_id)
    {
    //        dd(1);
        if ($request->isMethod('get')){
            $user = User::findOrFail($user_id);
            $user -> update($request->all());
            return redirect('home/myMass');
        }
        //        查询当前id数据
        $user = User::findOrFail($user_id);
        return view('home/Personal/myMass', compact('user'));
    }

    //修改密码
    public function doPassword(Request $request,$id)
    {
//        dd(1);
//        dd($request->password());
        $rules = [
            'password' => 'required|min:3|confirmed',
            'oldpassword' => 'required',
            'password_confirmation' => 'required',
        ];
        $messages = [
            'password.required' => '密码不能为空',
            'oldpassword.required' => '请输入密码',
            'password_confirmation.required' => '请确认密码',
            'password.min' => '密码最少3位',
            'password.confirmed' => '新密码和确认密码不匹配'
        ];
        $this->validate($request,$rules,$messages);
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('password');
        $res = DB::table('users')->where('id',$id)->select('password')->first();
        if(!Hash::check($oldpassword, $res->password)){
//            dd('密码不对');
            return redirect('home/myMass');
            exit;//原密码不对
        }
        $update = array(
            'password'  =>bcrypt($newpassword),
        );
        $result = DB::table('users')->where('id',$id)->update($update);
        if($result){
            echo '修改成功';
            Auth::logout();
            return redirect('home/index');
            exit;
        }else{
            echo '修改失败';
            return redirect('home/myMass');
            exit;
        }
        return redirect('home/index');
    }

    //修改头像
    public function iconupdate(Request $request,$id)
    {
//        dd($request->avatar);
        $iconname = md5(time()).'.jpg';
        $request->avatar->move('home/image',$iconname);

        $data = 'home/image'.'/'.$iconname;

        $data=[
            'avatar'=>$data,
        ];
//        dd($data);
        $result = DB::table('users')->where('id',$id)->update($data);
        return redirect('home/icon');
    }

    //修改密码
    public function setpwd(Request $request, $user_id)
    {
//                dd(1);
        if ($request->isMethod('get')){
            $user = User::findOrFail($user_id);
            $user -> update($request->all());
            return redirect('home/myMass');
        }
        //        查询当前id数据
        $user = User::findOrFail($user_id);
        return view('home/Personal/myMass', compact('user'));

    }
    //前台头像
    public function icon()
    {
        return view('Home/Personal/icon');
    }
    //隐私设置
    public function privacy()
    {
        return view('Home/Personal/privacySet');
    }
    //消息设置
    public function news()
    {
        return view('Home/Personal/newsSet');
    }
    //屏蔽设置
    public function screen()
    {
        return view('Home/Personal/screenSet');
    }


    //个人资料
    public function addmyzl(Request $request)
    {
        if ($request->isMethod('post')){
            User::create($request->all());
            return redirect('admin/user-list');
        }
        return view('admin/useradd');
    }
    public function updatemyzl(Request $request, $user_id)
    {
        if ($request->isMethod('post')){
            $user = User::findOrFail($user_id);
            $user -> update($request->all());
            return redirect('admin/user-list');
        }
//        查询当前id数据
        $user = User::findOrFail($user_id);
        return view('admin/userupdate', compact('user'));
    }


}
