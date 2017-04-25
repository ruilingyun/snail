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
use Illuminate\Support\Facades\DB;


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

    // 发微博
    public function pushMsg()
    {
        $id = Auth::user()->id;
        //根据模型将所以的数据查询出来
        $msg =Msg::where('id','>','0')->orderBy('id','desc')->get();
        $comment = Comment::where('id','>','0')->orderBy('id','desc')->get();
        $collect = DB::select('select * from collect');
        $collect_id = ($collect[0]->collect_id);
        $count_collect = count($collect);
        $zan = DB::table('zan')->where('zanuser_id',$id)->orderBy('id','desc')->get();
        $count_zan =count($zan);
        $relay = DB::table('relay')->where('user_id',$id)->orderBy('id','desc')->get();
        $count_relay =count($relay);
//        $a=[];
        foreach ($msg as $v){
            $say_id = $v->id;

            $a =  DB::table('collect')
                ->where('collect_id',$say_id)
                ->get();
            $v->collectionNum = count($a);
        }
        foreach ($msg as $v){
            $say_id = $v->id;

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




//        dd($count_zan);
        while($msg){
            return view('home.login-index',compact('msg','comment','count_zan','count_collect','collect_id','count_relay','a'));
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
//        账号等级
        $grade = DB::select('select grade from user_grade where user_id ='.$users_id);
        $gra = $grade[0]->grade +=1;
//       dd($gra);
        $grade=[
            'grade'=>$gra,
        ];

//        dd($data);
         DB::table('user_grade')->where('user_id',$users_id)->update($grade);
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

    //收藏微博 (取消收藏)
    public function collect($id)
    {
//        dd($id);
        $user_id = Auth::user()->id;
        $result = DB::select('select * from collect where collect_id ='.$id);
        $says = Msg::where('id','=',$id)->get();
        $users = $says->toArray();
        $users_id = $users[0]['users_id'];
//        dd($users_id);
        $collect_id = $id;
        if (empty($result)){
            $data=[
                'user_id'=>Auth::user()->id,
                'userby_id'=>$users_id,
                'collect_id'=>$id,
            ];
             DB::table('collect')->insert($data);
        }else{
             DB::delete('delete from collect where collect_id = ?',array($id));
        }
//        dd($id);
        return redirect('home/login-index');
    }
    //转发微博
    public function relay($id)
    {
//        dd($id);
        $user = Auth::user()->id;
        $result = DB::select('select * from msg where id ='.$id );
        $users_id = $user;
        $content = $result[0]->content;
        $data=[
            'users_id'=>$users_id,
            'content'=>$content,
            'type_id'=>1,
            'is_hot'=>1,
        ];

         DB::table('msg')->insert($data);

        $data1=[
            'user_id'=>$users_id,
            'msg_id'=>$id,
        ];
        DB::table('relay')->insert($data1);

        //        账号等级
        $grade = DB::select('select grade from user_grade where user_id ='.$users_id);

        $gra = $grade[0]->grade +=1;
//       dd($gra);
        $grade=[
            'grade'=>$gra,
        ];

//        dd($data);
        DB::table('user_grade')->where('user_id',$users_id)->update($grade);

        return redirect('home/login-index');

    }

}
