<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userlist()
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
            $messages =  "<script>alert('当前权限无法浏览管理员管理页面!')</script>";
            return view('admin/index', compact('messages'));
        }
//        验证角色是否是超级管理员
        $res = DB::table('roles')
            ->leftJoin('role_user', 'roles.id', 'role_user.role_id')
            ->get();
//          dd($res->all());
          $array = [];
        foreach ($res as $v) {
//            dd($v->display_name);
            if ($v->display_name == '超级管理员'){
                $array[] = $v->user_id;
            }
        }

        $loginuser_id = session()->get('adminUserId');
       if(!in_array($loginuser_id,$array)){
           $messages =  "<script>alert('普通管理员的权限当前无法访问超级管理员页面!')</script>";
           return view('admin/index', compact('messages'));
       }

        $users = User::paginate(3);
        foreach ($users as $user) {
        $roles = array();
//            dd($user->roles);
        foreach ($user->roles as $role) {
            $roles[] = $role->display_name;
//                dump($role->display_name);
//              dump($user->roles);
            }
            $user->roles = implode(',', $roles);
//          dd($user->roles);
        }
        return view('admin/userList', compact('users'));
    }


//    添加数据
    public function useradd(Request $request)
    {
        if ($request->isMethod('post')){
            $confirmed_code = str_random(10);
            User::create(array_merge($request->all(),['avatar'=>'image/tim.jpg','confirmed_code'=>$confirmed_code]));
            return redirect('admin/user-list');
        }
        return view('admin/useradd');
    }


//    更新数据
        public function userupdate(Request $request, $user_id)
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

    public function userdelete($user_id)
    {
//        dd($user_id);
        User::destroy($user_id);
        DB::table('userxq')->where('uid',$user_id)->delete();
        return redirect('admin/user-list');
    }

    public function allotrole(Request $request, $user_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色
            $user = User::find($user_id);

            DB::table('role_user')->where('user_id', $user_id)->delete();
            foreach($request->input('role_id') as $role_id){
//                $role = Permission::find($permission_id);
//                dump($data);
                $result =  DB::table('role_user')->insert([
                    'role_id'=>$role_id,
                    'user_id' => $user_id,
                ]);
//

            }
            return redirect('admin/user-list');
        }
        $roles = Role::all();
        return view('admin/allotrole', compact('roles','user_id'));
    }


}
