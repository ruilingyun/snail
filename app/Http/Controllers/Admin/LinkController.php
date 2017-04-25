<?php

namespace App\Http\Controllers\Admin;

use App\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function linkList()
    {
        $links =Links::where('id','>','0')->orderBy('id')->get();
        return view('admin/linkList', compact('links'));
    }

    public function linkAdd(Request $request)
    {
        if($request->isMethod('post')){
            $link_address = $request->input('link_address');
            $data = [
                'link_address' => $link_address,
            ];
            Links::create(array_merge($request->all(), $data));
            return redirect('admin/link-list');
        }

        return view('admin/linkAdd');

    }

    public function linkDelete($id)
    {
        $link = Links::find($id);
        $link->delete();
        return redirect('admin/link-list');
    }

    public function linkUpdate($id)
    {
        $link = Links::find($id);
        return view('admin/linkUpdate', compact('link'));
    }

    public function doUpdate(Request $request)
    {
        $id = $request->input('id');
        $link = Links::find($id);
//        dd($link);
        $links_name = $request->input('links_name');
        $link_address = $request->input('link_address');
        $link->links_name = $links_name;
        $link->link_address = $link_address;

        $link->save();
        return redirect('admin/link-list');
    }
}
