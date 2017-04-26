<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class AdvertController extends Controller
{
//    后台广告列表
    public function advertlist()
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
        $thisPerm = 'admin/advert-list';
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
            $messages =  "<script>alert('当前权限无法浏览广告列表!')</script>";
            return view('admin/index', compact('messages'));
        }

=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        $result = DB::table('advert')->paginate(3);
//        dd($result);
        return view('admin/advertlist', compact('result'));
    }

<<<<<<< HEAD
//    上架广告列表
    public function advertonline()
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
        $thisPerm = 'admin/advert-online';
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
            $messages =  "<script>alert('当前权限无法浏览已上架广告页面!')</script>";
            return view('admin/index', compact('messages'));
        }
        $result = DB::table('advert')->where('status','1')->paginate(5);
        return view('admin/advertonline', compact('result'));
    }

=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

//    添加广告
    public function advertadd(Request $request)
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
        $thisPerm = 'admin/advert-add';
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
            $messages =  "<script>alert('当前权限无法浏览添加广告页面!')</script>";
            return view('admin/index', compact('messages'));
        }
=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
//        dd(1);
        if ($request->isMethod('post')) {
//            dd($request->all());
            $iconname = md5(time()) . '.jpg';
            $request->file('icon')->move('admin/photo', $iconname);
            $dat = 'admin/photo' . '/' . $iconname;
//        dd($dat);
            $data = [
                'icon' => $dat,
                'name' => $request->name,
                'status' => $request->status,
            ];
//            dd($data);
            DB::table('advert')->insert($data);
            return redirect('admin/advert-list');

        }
        return view('admin/advertadd');
    }

//    删除广告
    public function advertdelete($id)
    {
<<<<<<< HEAD
        $result = DB::table('advert')->where('id', $id)->get();
        foreach($result as $v){
            $status = $v->status;
        }
//        dd($status);
        if ($status == 1){
            $messages = "<script>alert('该广告已上架,无法删除!')</script>";
            return view('admin/index', compact('messages'));
        }

=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
        //        dd($id);
        DB::table('advert')
            ->where('id',$id)
            ->delete();

        return redirect('admin/advert-list');
    }

    //    广告状态管理
//  改为下架
    public function downstatus($id)
    {
//        dd(1);
        $arr =[
            'status' => '2',
        ];
        DB::table('advert')
            ->where('id', $id)
            ->update($arr);
        return back();
    }

//    改为上架
    public function upstatus($id)
    {
        $arr =[
            'status' => '1',
        ];
        DB::table('advert')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
<<<<<<< HEAD



//    修改广告
    public function advertupdate(Request $request, $id)
    {
        if ($request->isMethod('post')){
            $iconname = md5(time()) . '.jpg';
            $request->file('icon')->move('admin/photo', $iconname);
            $dat = 'admin/photo' . '/' . $iconname;
            $data = [
                'icon' => $dat,
                'name' => $request->name,
                'status' => $request->status,
            ];
            DB::table('advert')->where('id', $id)->update($data);
            return redirect('admin/advert-list');
        }
        $result = DB::table('advert')->where('id', $id)->get();
        return view('admin/advertupdate',compact('result'));
    }
=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
}
