<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function roleList()
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
        $thisPerm = 'admin/role-list';
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
            $messages =  "<script>alert('当前权限无法浏览角色管理页面!')</script>";
            return view('admin/index', compact('messages'));
        }

        $roles = Role::paginate(3);
        foreach ($roles as $role){
            $perms = array();
//            dd($role->perms);
            foreach ($role->perms as $perm){
                $perms[] = $perm->display_name;
//                dump($perm->display_name);
            }
            $role->perms = implode(',', $perms);
        }
        return view('admin/rolelist', compact('roles'));
    }

    public function roleadd(Request $request)
    {
        if ($request->isMethod('post')){
//            dd($_POST);
            $role = Role::create($request->all());
//            dd($role);
            return redirect('admin/role-list');
        }
        return view('admin/roleadd');
    }

    public function allotpermission(Request $request, $role_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色
            $role = Role::find($role_id);


            DB::table('permission_role')->where('role_id', $role_id)->delete();
            foreach($request->input('permission_id') as $permission_id){

//                $role = Permission::find($permission_id);


//                dump($data);
               $result =  DB::table('permission_role')->insert([
                   'permission_id'=>$permission_id,
                   'role_id' => $role_id,
               ]);
//

            }
            return redirect('admin/role-list');
        }
        $permissions = Permission::all();
        return view('admin/allotpermission', compact('permissions','role_id'));
    }

    public function update(Request $request, $role_id)
    {
        if ($request->isMethod('post')){
            $role = Role::findOrFail($role_id);
            $role -> update($request->all());
            return redirect('admin/role-list');
        }
//        查询当前id数据
            $role = Role::findOrFail($role_id);
        return view('admin/roleupdate', compact('role'));
    }

//    删除信息
    public function roledelete($role_id)
    {
//        dd($role_id);
//       $result = DB::delete("delete from roles where id=?", ['id'=>$role_id]);
//        DB::table('roles')
//            ->where('id',$role_id)
//            ->delete();
        Role::destroy($role_id);
        return redirect('admin/role-list');

    }
}
