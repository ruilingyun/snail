<?php
namespace App\Tool\SMS;
namespace App\Http\Controllers\Home;

use App\Comment;

use App\Follow;
use App\Http\Requests\Home\DoPush;
use App\Http\Requests\Home\UserCommentRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Msg;
use App\Tool\SMS\SendTemplateSMS;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;





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
        $id = Auth::user()->id;
        //根据模型将所以的数据查询出来
        $users = User::where('id','>','0')->get();
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

        $follow = Follow::where('usersby_id','=',$id)->get();
        $follows = Follow::where('users_id','=',$id)->get();
        $comment =Comment::where('id','>','0')->orderBy('id','desc')->get();
        $reply=Reply::where('id','>','0')->orderBy('id','desc')->get();
        $users_id = DB::select('select * from msg where users_id = '.$id);
        $count_weibo =count($users_id);
        $count_fans = count($follow);
        $count_fans1 = count($follows);
        $news = DB::table('new')->where('is_hot',1)->get();
        while($msg){
            return view('home.login-index',compact('msg','comment','reply','users','count_weibo','count_fans','count_fans1','count_zan','count_collect','collect_id','count_relay','a','news'));
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
        $grade=[
            'grade'=>$gra,
        ];
         DB::table('user_grade')->where('user_id',$users_id)->update($grade);
        return redirect('home/login-index');
    }

    public function delMsg($id)
    {
        // 获取微博模型
        $msg = Msg::find($id);
        $msg->delete();
        return back();
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
        $msg = Msg::where('id','=',$say_id)->get();
        $msgs_id = $msg->toArray();
        $says_uid = $msgs_id[0]['users_id'];
        $data=[
            'users_id'=>$says_uid,
            'commit_users_id'=>$users_id,
        ];
        Comment::create(array_merge($request->all(),$data));

        return back();
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
//        $result = DB::select('select * from collect where collect_id ='.$id);
        $says = Msg::where('id','=',$id)->get();
        $users = $says->toArray();
        $users_id = $users[0]['users_id'];
//        dd($users_id);
        $collect_id = $id;

//        dd($users_id);
        $result = DB::table('collect')->where('collect_id',$collect_id)->where('user_id',$user_id)->get();
        if (empty($result[0])){
            $data=[
                'user_id'=>Auth::user()->id,
                'userby_id'=>$users_id,
                'collect_id'=>$id,
            ];
             DB::table('collect')->insert($data);
        }else{
//             DB::delete('delete from collect where collect_id = ?',array($id));
             DB::table('collect')->where('collect_id',$collect_id)->where('user_id',$user_id)->delete();

        }
//        dd($id);
        return back();
    }
    //转发微博
    public function relay($id)
    {
//        dd($id);
        $user = Auth::user()->id;
        $result = DB::select('select * from msg where id =' . $id);
        $users_id = $user;
        $content = $result[0]->content;
        $data = [
            'users_id' => $users_id,
            'content' => $content,
            'type_id' => 1,
            'is_hot' => 1,
        ];

        DB::table('msg')->insert($data);

        $data1 = [
            'user_id' => $users_id,
            'msg_id' => $id,
        ];
        DB::table('relay')->insert($data1);

        //        账号等级
        $grade = DB::select('select grade from user_grade where user_id =' . $users_id);
//        dd($grade);

        $uid = Auth::user()->id;
        if (empty($grade[0])){
            $data4=[
                'user_id'=>$uid,
                'grade'=>1,
            ];
            DB::table('user_grade')->insert($data4);
        }
        $gra = $grade[0]->grade += 1;
//       dd($gra);
        $grade = [
            'grade' => $gra,
        ];

//        dd($data);
        DB::table('user_grade')->where('user_id', $users_id)->update($grade);

        return back();
    }
    // 回复
    public function doReply(Request $request)
    {
        $user = Auth::user()->id;
        $txt=$request->input('reply_content'); //获取提交的数据
        $txt= htmlspecialchars(stripslashes($txt));
        //   $txt=mysql_real_escape_string(strip_tags($txt),$link); //过滤HTML标签，并转义特殊字符
        if( mb_strlen($txt)<1 ||  mb_strlen($txt)>140){
            return  back();
        }
        $users_id=$user;
        //插入数据到数据表中
        $data=[
            'users_id'=>$users_id,
        ];
//        dd(array_merge($request->all(),$data));
        Reply::create(array_merge($request->all(),$data));

        return redirect('home/login-index');
    }

    public function other_per($id)
    {
        //根据模型将所以的数据查询出来
        $reply = Reply::where('id','>','0')->orderBy('id','desc')->get();
        $msg = Msg::where('users_id','=',$id)->orderBy('id','desc')->get();
        $comment =Comment::where('id','>','0')->orderBy('id','desc')->get();
        $users_id = DB::select('select * from msg where users_id = '.$id);
        $follow = Follow::where('usersby_id','=',$id)->get();
        $follows = Follow::where('users_id','=',$id)->get();
        $count_weibo =count($users_id);
        $count_fans = count($follow);
        $count_fans1 = count($follows);
        $users = User::where('id','=',$id)->get();
        $follow = Follow::where('users_id','=',$id)->get();
        while($msg){
            return view('home.other_vip',compact('msg','comment','reply','count_weibo','users','follow','count_fans','count_fans1'));
        }
    }

    public function guanzhu(Request $request, $id)
    {
        $data=[
            'users_id'=>$id,
        ];
        Follow::create(array_merge($request->all(),$data));

        return redirect('home/other_per'.'/'.$id);
    }

    public function nozhu(Request $request,$id)
    {
        $users_id = $request->input('users_id');
        $follow = Follow::where('users_id','=',$users_id)->where('usersby_id','=',$id);
        $follow->delete();
        return redirect('home/other_per'.'/'.$users_id);
    }

}
