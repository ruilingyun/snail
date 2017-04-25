<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function permissionList()
    {
        $permissions = Permission::paginate(3);
//        dump($permissions);
        return view('admin/permissionList', compact('permissions'));
    }

    public function permissionadd(Request $request)
    {
        if ($request->isMethod('post')){
            //添加权限操作
            $permission = Permission::create($request->all());
            return redirect('admin/permission-list');
        }
        return view('admin/permissionadd');
    }

    public function permissionupdate(Request $request, $permission_id)
    {
        //修改用户信息
        if($request->isMethod('post')){
            $permission = Permission::findOrFail($permission_id);
            $permission -> update($request->all());
            return redirect('admin/permission-list');
        }
        //查询当前权限信息
        $permission = Permission::findOrFail($permission_id);
        return view('admin/permissionupdate', compact('permission'));
    }

    public function permissiondelete($permission_id)
    {
        //删除信息
        Permission::destroy([$permission_id]);
        return redirect('admin/permission-list');
    }
}
