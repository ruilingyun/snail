<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    //新闻列表
    public function newlist()
    {
<<<<<<< HEAD
        //验证是否登录
        if(empty(session()->get('adminName'))){
            $messages =  "<script>alert('请登录后浏览!')</script>";
            return view('admin/login', compact('messages'));
        }

        // 查询登录者信息
        // 登录者 用户名
        $logName = session()->get('adminName');
//        dd($logName);
        $res = DB::table('users')
            ->where('name',$logName)
            ->get();
        foreach ($res as $v ){
            $pass = $v->password;
            // 获取登录者id
            $user_id = $v->id;
        }

        // 判断是否是超级管理员或管理员
        $result = DB::table('roles')
            ->leftJoin('role_user', 'roles.id','role_user.role_id')
            ->get();
//            dump($result->all());
        $arr = array();
        $roleId = array();
        foreach ($result as $v){

//                  dump($v->display_name);
            if($v->display_name == '管理员'|| $v->display_name == '超级管理员' ){
                // 获取超级管理员和管理员 在users表中的 id
                $arr[] = $v->user_id;

            }


        }
        // 如果登录者id在$arr 中则为管理员或超级管理员，否则不能登陆后台
        if(!in_array($user_id,$arr)){
            $messages =  "<script>alert('不是管理员!')</script>";
            return view('admin/index', compact('messages'));
        }

        // 两表联查，当登录者是超管或者管理员的时候对应的权限表信息
        $perm = DB::table('permissions')
            ->rightJoin('permission_role','permissions.id','permission_role.permission_id')
            ->whereIn('role_id',$roleId)
            ->get();
        //获取当前路由对应的权限
        $perms = array();
        foreach ($perm as $v){
            $perms[] = $v->name;
        }

        // 判断当前路由是否在登录者路由权限之下
//dump($perms);
        //当前路由对应得权限名称为
        $thisPerm = 'admin/new-list';
        $permL =  DB::table('permissions')
            ->where('name',$thisPerm)
            ->get();
        foreach ($permL as $v){
            $permId = $v->id;
        }

        // 查询当前权限id 所有的角色id
        $permR =  DB::table('permission_role')
            ->where('permission_id', $permId)
            ->get();
        foreach ($permR as $v){
            $roleId[] = $v->role_id;
        }
        // 登录者id
        $logId = session()->get('adminUserId');
        $roles = DB::table('role_user')
            ->where('user_id',$logId)
            ->get();

        foreach ($roles as $v){
            $re = $v->role_id;
        }
//        dd($roleId);
        // 判断当前路由是否在登录者路由权限之下
        if(!in_array($re,$roleId)){
            $messages =  "<script>alert('当前权限无法浏览新闻列表!')</script>";
            return view('admin/index', compact('messages'));
        }
//        dd(11);
        $result = DB::table('users')
            ->rightJoin('new' , 'users.id', 'new.user_id')
            ->paginate(3);
=======
//        dd(11);
        $result = DB::table('users')
            ->rightJoin('new' , 'users.id', 'new.user_id')
            ->get();
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        foreach ($result as $v){
            $type_id = $v->type_id;
            $type = DB::table('type')
                ->where('id',$type_id)
                ->get();
<<<<<<< HEAD
//            dd($type);
=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
            //根据类型id 查找类型名，并添加到对应的结果中
            foreach ($type as $value){
                $typeval = $value->name;
            }
//            dd($typeval);
            $v->type = $typeval;
        }
<<<<<<< HEAD
//        dd($v->type);
=======
//        dd($result);
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        return view('admin/newlist', compact('result','type'));

    }

<<<<<<< HEAD
//    新闻详情
    public function newdetail($id)
    {
       $result = DB::table('new')->where('id', $id)->get();
//       dd($result);
        return view('admin/newdetail', compact('result'));
    }

=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    //修改新闻类型
    public function newupdate(Request $request, $id)
    {
//        dd(1);
        if($request->isMethod('post')){
            $data = [
                'type_id' => $request->type_id[0],
            ];
//            dd($data);
            DB::table('new')
                ->where('id',$id)
                ->update($data);

            return redirect('admin/new-list');
        }

        $types = DB::table('type')
            ->get();
//        dd($types);
//        dd($id);
        return view('admin/newupdate',compact('types','id'));

    }

    //删除新闻
    public function newdelete($id)
    {
//        dd($id);
        DB::table('new')
            ->where('id',$id)
            ->delete();

        return redirect('admin/new-list');

    }

    //新闻发布
    public function newpublish(Request $request)
    {
//        dd(1);
//        dd($request->article_content);
        if($request->isMethod('post')){
<<<<<<< HEAD
//        dd($request->all());
            $iconname = md5(time()) . '.jpg';
            $request->file('photos')->move('admin/photo', $iconname);
            $dat = 'admin/photo' . '/' . $iconname;
//        dd($dat);
            $data = [
                'is_hot' => $request->is_hot,
                'type_id' => $request->type_id[0],
                'title' => $request->title,
                'photos' => $dat,
                'content' => $request->content,
                'user_id' => session()->get('adminUserId'),
=======
//            dd($request->type_id);
            $data = [
                'is_hot' => $request->is_hot,
                'type_id' => $request->type_id[0],
                'content' => $request->content,
                'user_id' => '17'
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

            ];
//            dd($data);
            DB::table('new')
                ->insert($data);
            return redirect('admin/new-list');
        }
        $types = DB::table('type')
            ->get();
//         dd($types);
        return view('admin/newpublish',compact('types'));
    }

<<<<<<< HEAD
=======
    //查看内容详情
    public function newdetail($id)
    {
//        dd($id);
        //查询对应新闻信息
        $result = DB::table('new')
            ->where('id',$id)
            ->get();

        //查找新闻类别id
        foreach ($result as $v){
            $type_id = $v->type_id;
        }

        $types = DB::table('type')
            ->where('id',$type_id)
            ->get();
//        dd($result);
        return view('admin/newsContent',compact('result','types'));
    }




>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

//    新闻状态管理
//  改为非热门
    public function ishot($id)
    {
//        dd(1);
        $arr =[
            'is_hot' => '2',
        ];
        DB::table('new')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
//    改为热门
    public function nothot($id)
    {
        $arr =[
            'is_hot' => '1',
        ];
        DB::table('new')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
}
