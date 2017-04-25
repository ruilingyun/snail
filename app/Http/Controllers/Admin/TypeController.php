<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
//    新闻分类列表
    public function typelist()
    {
        $types =  DB::table('type')->get();
//        dd($types);
        return view('admin/typelist', compact('types'));
    }

//    新闻分类添加表
    public function typeadd(Request $request)
    {
        if ($request->isMethod('post')){
            $data = [
                'name' => $request->name,
            ];
            DB::table('type')
                ->insert($data);

            return redirect('admin/type-list');
        }

        return view('admin/typeadd');
    }

//    删除新闻分类
    public function typedelete($id)
    {
        DB::table('type')
            ->where('id',$id)
            ->delete();
        return redirect('admin/type-list');
    }
}
