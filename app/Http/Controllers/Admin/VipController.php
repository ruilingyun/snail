<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VipController extends Controller
{
    //用户列表
    public function viplist()
    {
//        dd(11);
        // 查询角色 的 id
        $result = DB::table('roles')
            ->where('display_name', '会员用户')
            ->get();
//        dd($result);
        foreach ($result as $v){
            // 获取 普通角色 id
            $r_id = $v->id;
//            dd($r_id);
        }
        // 获取普通用户角色名称
        $vipname = DB::table('roles')
            ->where('id',$r_id)
            ->get();
        foreach ($vipname as $v){
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

//        dd($users);
        return view('admin/viplist', compact('users', 'display_name'));
    }

    //重置密码
    public function usersRe($id)
    {
//        dd($id);
        $pass = '123456';
        $arr = [
            'password' => Hash::make($pass),
        ];


        DB::table('users')
            ->where('id', $id)
            ->update($arr);

        return redirect('admin/UserList');

    }

    //禁用用户
    public function forbiddenusers($user_id)
    {
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
        DB::table('users')->where('id', $user_id)->delete();
        return back();
    }

}


