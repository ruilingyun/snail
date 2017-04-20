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
<<<<<<< HEAD
=======
//            dd($role);
>>>>>>> a13e66ab9de8e4ab64fbc560875f71c116cf873f
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
