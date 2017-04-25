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
        $result = DB::table('advert')->paginate(3);
//        dd($result);
        return view('admin/advertlist', compact('result'));
    }


//    添加广告
    public function advertadd(Request $request)
    {
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
}
