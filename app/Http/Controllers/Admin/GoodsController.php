<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
//    商品列表
    public function goodslist()
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
        $thisPerm = 'admin/goods-list';
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
            $messages =  "<script>alert('当前权限无法浏览商品列表页面!')</script>";
            return view('admin/index', compact('messages'));
        }

        $result = DB::table('goods')->paginate(3);
//        dd($result);
        foreach($result as $v){
            $id = $v->goodstype_id;
//            dd($id);
            $types = DB::table('goodstype')->where('id',$id)->get();
//            dd($res);
            foreach($types as $value){
                $name = $value->name;
            }
            $v->type = $name;
//            dd($v->type);
        }
        return view('admin/goodslist', compact('result','types'));
    }

//  添加商品
    public function goodsadd(Request $request)
    {
        if ($request->isMethod('post')){
//            dd($request->input('goodstype_id'));
            $iconname = md5(time()) . '.jpg';
            $request->file('photos')->move('admin/photo', $iconname);
            $dat = 'admin/photo' . '/' . $iconname;
//        dd($dat);

            $data = [
                'photos' => $dat,
                'content' => $request->content,
                'goodstype_id' => $request->goodstype_id,
                'status' => $request->status,
            ];
//            dd($date);
            DB::table('goods')->insert($data);
            return redirect('admin/goods-list');
        }
        $result = DB::table('goodstype')->get();
        return view('admin/goodsadd', compact('result'));
    }

//    修改商品分类
    public function goodsupdate(Request $request, $id)
    {
//        dd(1);
        if($request->isMethod('post')){
            $data = [
                'goodstype_id' => $request->goodstype_id[0],
            ];
//            dd($data);
            DB::table('goods')
                ->where('id',$id)
                ->update($data);

            return redirect('admin/goods-list');
        }

        $types = DB::table('goodstype')
            ->get();
//        dd($types);

        return view('admin/goodstypeupdate',compact('types','id'));

    }


//    删除商品
        public function goodsdelete($id)
        {
            DB::table('goods')->where('id', $id)->delete();
            return back();
        }


//  商品状态管理
//  改为下架
    public function downstatus($id)
    {
//        dd(1);
        $arr =[
            'status' => '2',
        ];
        DB::table('goods')
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
        DB::table('goods')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
}
