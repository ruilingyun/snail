<?php
namespace App\Tool\SMS;
namespace App\Http\Controllers\Home;

use App\Comment;
use App\Http\Requests\Home\DoPush;
use App\Http\Requests\Home\UserCommentRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Msg;
use App\Tool\SMS\SendTemplateSMS;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //荣连云发送短信验证码
    public function sendSMS()
    {
        $sms = new SendTemplateSMS();
        $sms->sendSMS('13083036500',array('1028',5),1);
        $result = new Result();
        $result->status = 0;
        $result->message = '短信验证码发送成功!';
        return $result->tojosn();
    }

//    手机注册
    public function phoneregister()
    {
        return view('home/phoneregister');
    }

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

//        dd($new);

        //根据模型将所以的数据查询出来
        $msg =Msg::where('id','>','0')->orderBy('id','desc')->get();
        $comment =  Comment::where('id','>','0')->orderBy('id','desc')->get();
        $news= DB::table('new')->get();


        while($msg){
            return view('home/login-index',compact('msg', 'comment' ,'news'));
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
//        $grade += 1;
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
        $result = DB::select('select * from collect where collect_id ='.$id);
//        dd($result);
        $collect_id = $id;
        if (empty($result)){
            $data=[
                'user_id'=>Auth::user()->id,
                'collect_id'=>$id,
            ];
             DB::table('collect')->insert($data);
        }else{
             DB::delete('delete from collect where collect_id = ?',array($id));
        }
        return redirect('home/login-index');
    }
    //转发微博
    public function relay($id)
    {
//        dd($id);
        //根据模型将所以的数据查询出来
        $msg = Msg::where('id', '=', $id)->orderBy('id', 'desc')->get();
//        $txt=$request->input('content'); //获取提交的数据
//        $txt= htmlspecialchars(stripslashes($txt));
        //   $txt=mysql_real_escape_string(strip_tags($txt),$link); //过滤HTML标签，并转义特殊字符
//        if( mb_strlen($txt)<1 ||  mb_strlen($txt)>140){
//            return back();
//        }
        $users_id=$user;
        //插入数据到数据表中
        $data=[
            'users_id'=>$users_id,
        ];
        Msg::create(array_merge($request->all(),$data));
//        dd($msg);
        while ($msg) {
            return view('home.login-index', compact('msg'));
        }

    }

}
