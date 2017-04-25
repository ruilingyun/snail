<?php

namespace App\Http\Controllers\Admin;

use App\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
{

    //新闻列表
    public function msglist()
    {
        $result = DB::table('users')
            ->rightJoin('msg' , 'users.id', 'msg.user_id')
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
            $v->type = $typeval;

        }
        return view('admin/msglist', compact('result','type'));

    }

    //修改新闻类型
    public function msgupdate(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = [
                'type_id' => $request->type_id[0],
            ];
            DB::table('msg')
                ->where('id',$id)
                ->update($data);

            return redirect('admin/msg-list');
        }

        $types = DB::table('type')
            ->get();
        return view('admin/msgupdate',compact('types','id'));

    }

    //删除新闻
    public function msgdelete($id)
    {
//        dd($id);
        DB::table('msg')
            ->where('id',$id)
            ->delete();

        return redirect('admin/msg-list');

    }

    //新闻发布
    public function msgpublish(Request $request)
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
            DB::table('msg')
                ->insert($data);
            return redirect('admin/msg-list');
        }
        $types = DB::table('type')
            ->get();
        return view('admin/msgpublish',compact('types'));
    }

    //查看内容详情
    public function newsDes($id)
    {
//        dd($id);
        //查询对应新闻信息
        $result = DB::table('news')
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
        DB::table('msg')
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
        DB::table('msg')
            ->where('id', $id)
            ->update($arr);
        return back();
    }
}



