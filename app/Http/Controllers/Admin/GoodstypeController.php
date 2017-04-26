<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodstypeController extends Controller
{
//    商品分类列表
    public function goodstypelist()
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
        $thisPerm = 'admin/goodstype-list';
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
            $messages =  "<script>alert('当前权限无法浏览商品分类列表页面!')</script>";
            return view('admin/index', compact('messages'));
        }

        $result = DB::table('goodstype')->get();
//        dd($result);
        return view('admin/goodstypelist', compact('result'));
    }

//    商品类别添加
    public function goodstypeadd(Request $request)
    {
        if ($request->isMethod('post')){
            $data = [
                'name' => $request->name,
            ];
//            dd(1);
            DB::table('goodstype')
                ->insert($data);

            return redirect('admin/goodstype-list');
        }

        return view('admin/goodstypeadd');
    }

//    修改商品分类
    public function goodstypeupdate(Request $request, $id)
    {
        if ($request->isMethod('post')){
            $data = [
                'name' => $request->name,
            ];
            DB::table('goodstype')->where('id', $id)
                ->update($data);

            return redirect('admin/goodstype-list');
        }
        $result = DB::table('goodstype')->where('id', $id)->get();
//        dd($result);
        return view('admin/goodstypeupdate', compact('result'));
    }

//    删除商品类别
    public function goodstypedelete($id)
    {
        DB::table('goodstype')
            ->where('id',$id)
            ->delete();
        return redirect('admin/goodstype-list');
    }
}
