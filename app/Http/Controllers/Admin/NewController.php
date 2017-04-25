<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    //新闻列表
    public function newlist()
    {
//        dd(11);
        $result = DB::table('users')
            ->rightJoin('new' , 'users.id', 'new.user_id')
            ->get();
        foreach ($result as $v){
            $type_id = $v->type_id;
            $type = DB::table('type')
                ->where('id',$type_id)
                ->get();
            //根据类型id 查找类型名，并添加到对应的结果中
            foreach ($type as $value){
                $typeval = $value->name;
            }
//            dd($typeval);
            $v->type = $typeval;
        }
//        dd($result);
        return view('admin/newlist', compact('result','type'));

    }

    //修改新闻类型
    public function newupdate(Request $request, $id)
    {
//        dd(1);
        if($request->isMethod('post')){
            $data = [
                'type_id' => $request->type_id[0],
            ];
//            dd($data);
            DB::table('new')
                ->where('id',$id)
                ->update($data);

            return redirect('admin/new-list');
        }

        $types = DB::table('type')
            ->get();
//        dd($types);
//        dd($id);
        return view('admin/newupdate',compact('types','id'));

    }

    //删除新闻
    public function newdelete($id)
    {
//        dd($id);
        DB::table('new')
            ->where('id',$id)
            ->delete();

        return redirect('admin/new-list');

    }

    //新闻发布
    public function newpublish(Request $request)
    {
//        dd(1);
//        dd($request->article_content);
        if($request->isMethod('post')){
//            dd($request->type_id);
            $data = [
                'is_hot' => $request->is_hot,
                'type_id' => $request->type_id[0],
                'content' => $request->content,
                'user_id' => '17'

            ];
//            dd($data);
            DB::table('new')
                ->insert($data);
            return redirect('admin/new-list');
        }
        $types = DB::table('type')
            ->get();
//         dd($types);
        return view('admin/newpublish',compact('types'));
    }

    //查看内容详情
    public function newdetail($id)
    {
//        dd($id);
        //查询对应新闻信息
        $result = DB::table('new')
            ->where('id',$id)
            ->get();

        //查找新闻类别id
        foreach ($result as $v){
            $type_id = $v->type_id;
        }

        $types = DB::table('type')
            ->where('id',$type_id)
            ->get();
//        dd($result);
        return view('admin/newsContent',compact('result','types'));
    }





//    新闻状态管理
//  改为非热门
    public function ishot($id)
    {
//        dd(1);
        $arr =[
            'is_hot' => '2',
        ];
        DB::table('new')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
//    改为热门
    public function nothot($id)
    {
        $arr =[
            'is_hot' => '1',
        ];
        DB::table('new')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
}
