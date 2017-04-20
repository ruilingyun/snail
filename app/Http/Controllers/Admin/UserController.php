<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userList()
    {
        $users = User::paginate(3);
        foreach ($users as $user) {
<<<<<<< HEAD
            $roles = array();
//            dd($user->roles);
            foreach ($user->roles as $role) {
                $roles[] = $role->display_name;
//                dump($role->display_name);
//              dump($user->roles);
            }
            $user->roles = implode(',', $roles);
//        dd($user->roles);
        }
=======
        $roles = array();
//            dd($user->roles);
        foreach ($user->roles as $role) {
            $roles[] = $role->display_name;
//                dump($role->display_name);
//              dump($user->roles);
        }
        $user->roles = implode(',', $roles);
//        dd($user->roles);
    }
>>>>>>> a13e66ab9de8e4ab64fbc560875f71c116cf873f
        return view('admin/userList', compact('users'));
    }

    public function useradd(Request $request)
    {
        if ($request->isMethod('post')){
<<<<<<< HEAD
            User::create(array_merge($request->all(),['avatar'=>'image/tim.jpg']));
=======
            $confirmed_code = str_random(10);
            User::create(array_merge($request->all(),['avatar'=>'image/tim.jpg','confirmed_code'=>$confirmed_code]));
>>>>>>> a13e66ab9de8e4ab64fbc560875f71c116cf873f
            return redirect('admin/user-list');
        }
        return view('admin/useradd');
    }


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
        User::destroy($user_id);
        return redirect('admin/user-list');
    }

    public function allotrole(Request $request, $user_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色
            $user = User::find($user_id);

<<<<<<< HEAD

            DB::table('role_user')->where('user_id', $user_id)->delete();
            foreach($request->input('role_id') as $role_id){

//                $role = Permission::find($permission_id);


=======
            DB::table('role_user')->where('user_id', $user_id)->delete();
            foreach($request->input('role_id') as $role_id){
//                $role = Permission::find($permission_id);
>>>>>>> a13e66ab9de8e4ab64fbc560875f71c116cf873f
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

<<<<<<< HEAD
=======

>>>>>>> a13e66ab9de8e4ab64fbc560875f71c116cf873f
}
