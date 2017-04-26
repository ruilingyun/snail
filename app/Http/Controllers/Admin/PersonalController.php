<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
//    个人资料显示
    public function personalinfor()
    {
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
        $thisPerm = 'admin/personal-infor';
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
            $messages =  "<script>alert('当前权限无法浏览个人信息页面!')</script>";
            return view('admin/index', compact('messages'));
        }


//        根据session值查出登录用户id
        $user_id = (session()->get('adminUserId'));
//        根据id查出当前管理员的详细信息
        $result = DB::table('userxq')->where('uid', $user_id)->get();
        $users = DB::table('users')->where('id', $user_id)->get();
        foreach($users as $v){
            $icon = $v->avatar;
        }
//        dd($result);
        return view('admin/personalinfor', compact('result','icon'));
    }

//    编辑个人资料
    public function personalupdate(Request $request, $id)
    {
        if ($request->isMethod('post')){
//                    dd($request->notice);
            $data = [
                'iname' => $request->iname,
                'age' => $request->age,
                'sex' => $request->sex,
                'phone' => $request->phone,
                'QQ' => $request->QQ,
                'date' => $request->date,
                'notice' => $request->notice,
            ];
            DB::table('userxq')->where('uid',$id)->update($data);
            return redirect('admin/personal-infor');
        }
        $result = DB::table('userxq')->where('uid', $id)->get();
        return view('admin/personalupdate', compact('result'));
    }

//    个人信息头像修改
    public function iconupdate(Request $request, $id)
    {
        if ($request->isMethod('post')){
            $iconname = md5(time()) . '.jpg';
            $request->file('avatar')->move('admin/photo', $iconname);
            $dat = 'admin/photo' . '/' . $iconname;
            $data = [
              'avatar' => $dat,
            ];
            DB::table('users')->where('id', $id)->update($data);
            return redirect('admin/personal-infor');
        }
        $result = DB::table('users')->where('id', $id)->get();
//        dd($result);
        return view('admin/iconupdate', compact('result'));
    }

////    个人信息删除
//    public function personaldelete($id)
//    {
////        dd($id);
//        DB::table('users')->where('id', $id)->delete();
//        return back();
//    }
}
