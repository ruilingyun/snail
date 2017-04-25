@extends('layouts/admin/master')
@section('title', '后台管理系统-新增链接')
<style>
    .link_title{
        width: 100%;
        height: 40px;
        line-height: 40px;
        border-bottom: 1px solid pink;
    }
    .li_link{
        list-style: none;
        height: 30px;
    }
    .permissionadd_table{
        width: 500px;
        height: 400px;
        margin-left:250px;
        margin-top: 20px;
    }
</style>
@section('content')
    <div class="link_title">
        <ul class="clearfix">
            <li class="li_link pull-left"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_link pull-left"><a href="{{url('admin/link-list')}}">链接列表=></a></li>
            <li class="li_link pull-left">修改链接</li>
        </ul>
    </div>
    <div class="permissionadd_table">
        <table class="table-bordered">
            <form action="{{url('admin/doLink')}}" method="post">
                {{csrf_field()}}
                <tr>
                    <td>网站名: </td>
                    <td><input type="text" name="links_name" value="{{$link->links_name}}"></td>
                </tr>
                <tr>
                    <td>网站地址: </td>
                    <td><input type="text" name="link_address" value="{{$link->link_address}}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="{{$link->id}}">
                        <input type="submit" class="btn" value="修改">
                    </td>
                </tr>
            </form>
        </table>
    </div>
@endsection