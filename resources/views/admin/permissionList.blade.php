@extends('layouts/admin/master')
@section('title', '后台管理系统-权限管理')
<style>
    .power_title{
        width: 100%;
        height: 30px;
        /*background-color: pink;*/
        line-height: 30px;
        border-bottom: 1px solid pink;
    }
   .li_power{
       list-style: none;
        float: left;
       /*width: 80px;*/
       height: 30px;
    }
    .li_power2{
        list-style: none;
        float: left;
        margin-left: 40px;
        /*width: 60px;*/
        height: 30px;
    }
    .table_power{
        margin-top:50px;;
        width: 1000px;
        margin-left: 250px; ;

    }
    tr:hover{
        background-color: #d7ebf6;
    }
    .permission_tr_title{
        background-color: #98cbe8;
    }
</style>
@section('content')
    <div class="power_title">
        <ul>
            <li class="li_power"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_power"><a href="{{url('admin/permissionList')}}">权限管理=></a></li>
            <li class="li_power">权限列表</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/permission-add')}}">新增权限</a></li>
            <li class="li_power2"><a href="">批量删除</a></li>
            <li class="li_power2"><a href="">跟新排序</a></li>
        </ul>
    </div>
    <div class="table_power">
        <table class="table table-bordered">
           <tr class="permission_tr_title">
               <td><b>ID</b></td>
               <td><b>权限路由</b></td>
               <td><b>权限名称</b></td>
               <td><b>权限描述</b></td>
               <td><b>操作</b></td>
           </tr>
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->display_name}}</td>
                <td>{{$permission->description}}</td>
                <td>
                    <a href="permission-update/{{$permission->id}}" class="btn btn-default">修改</a>
                    <a href="permission-delete/{{$permission->id}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
            @endforeach
        </table>
        {{$permissions->links()}}
    </div>
@endsection