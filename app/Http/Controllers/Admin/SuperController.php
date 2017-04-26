<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperController extends Controller
{
    //用户列表
    public function superlist()
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
        $thisPerm = 'admin/user-list';
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
            $messages =  "<script>alert('当前权限无法浏览超级管理列表页面!')</script>";
            return view('admin/index', compact('messages'));
        }

//        dd(11);
        // 查询角色 的 id
        $result = DB::table('roles')
            ->where('display_name', '超级管理员')
            ->get();
//        dd($result);
        foreach ($result as $v){
            // 获取 普通角色 id
            $r_id = $v->id;
//            dd($r_id);
        }
        // 获取普通用户角色名称
        $supername = DB::table('roles')
            ->where('id',$r_id)
            ->get();
        foreach ($supername as $v){
            $display_name = $v->display_name;
        }
//        dd($display_name);

        $user = DB::table('role_user')
            ->where('role_id', $r_id)
            ->get();
        $arr = array();
        foreach ($user as $v){
            $arr[] = $v->user_id;
        }
//        dd($arr);
        $users = DB::table('users')
            ->whereIn('id',$arr)
            ->paginate(3);
//        dd($users);

        $userxq = DB::table('userxq')->whereIn('uid',$arr)->paginate(3);
//        dd($userxq);

        return view('admin/superlist', compact('users', 'display_name', 'userxq'));
    }

//    用户详情
    public function detail($id)
    {
        // 查询角色 的 id
//       dd($id);

        $userxq = DB::table('userxq')->where('uid', $id)->paginate(3);
//        dd($userxq);

        return view('admin/superdetail', compact('userxq'));
    }


    //禁用用户
    public function forbiddenusers($user_id)
    {
        // 判断是否是超级管理员或管理员
        $result = DB::table('roles')
            ->leftJoin('role_user', 'roles.id','role_user.role_id')
            ->get();
//            dump($result->all());
        $arr = array();
        $roleId = array();
        foreach ($result as $v){

//                  dump($v->display_name);
            if( $v->display_name == '超级管理员' ){
                // 获取超级管理员和管理员 在users表中的 id
                $arr[] = $v->user_id;
            }
        }
        // 如果登录者id在$arr 中则为管理员或超级管理员，否则不能登陆后台
        if(!in_array($user_id,$arr)){
            $messages =  "<script>alert('您的权限暂且无法进行此操作!')</script>";
            return view('admin/index', compact('messages'));
        }

        $arr =[
            'status' => '0',
        ];
//        dd($arr);
        DB::table('users')
            ->where('id', $user_id)
            ->update($arr);
        return back();

    }

    //启用用户
    public function startusers($user_id)
    {
        // 判断是否是超级管理员或管理员
        $result = DB::table('roles')
            ->leftJoin('role_user', 'roles.id','role_user.role_id')
            ->get();
//            dump($result->all());
        $arr = array();
        $roleId = array();
        foreach ($result as $v){

//                  dump($v->display_name);
            if( $v->display_name == '超级管理员' ){
                // 获取超级管理员和管理员 在users表中的 id
                $arr[] = $v->user_id;
            }
        }
        // 如果登录者id在$arr 中则为管理员或超级管理员，否则不能登陆后台
        if(!in_array($user_id,$arr)){
            $messages =  "<script>alert('您的权限暂且无法进行此操作!')</script>";
            return view('admin/index', compact('messages'));
        }

        $arr =[
            'status' => '1',
        ];
        DB::table('users')
            ->where('id', $user_id)
            ->update($arr);
        return back();

    }

    public function delete($user_id)
    {
        // 判断是否是超级管理员或管理员
        $result = DB::table('roles')
            ->leftJoin('role_user', 'roles.id','role_user.role_id')
            ->get();
//            dump($result->all());
        $arr = array();
        $roleId = array();
        foreach ($result as $v){

//                  dump($v->display_name);
            if( $v->display_name == '超级管理员' ){
                // 获取超级管理员和管理员 在users表中的 id
                $arr[] = $v->user_id;
            }
        }
        // 如果登录者id在$arr 中则为管理员或超级管理员，否则不能登陆后台
        if(!in_array($user_id,$arr)){
            $messages =  "<script>alert('您的权限暂且无法进行此删除操作!')</script>";
            return view('admin/index', compact('messages'));
        }
        DB::table('users')->where('id', $user_id)->delete();
        return back();
    }

}




