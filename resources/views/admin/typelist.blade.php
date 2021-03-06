@extends('layouts.admin.master')
@section('title', '后台管理系统-分类列表')
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
        width: 600px;
        margin-left: 250px;
        margin-top: 0px;

    }
    tr:hover{
        background-color: #d7ebf6;
    }
    .role_tr_title{
        background-color: #98cbe8;
    }
    .search{
        width: 1000px;
        height: 50px;
        margin-left: 250px;
    }
</style>
@section('content')
    <div class="power_title">
        <ul>
            <li class="li_power"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_power"><a href="{{url('admin/permissionList')}}">用户管理=></a></li>
            <li class="li_power">分类列表</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
        <li class="li_power2"><a href="{{url('admin/type-add')}}">新增类别</a></li>
        {{--<li class="li_power2"><a href="">批量删除</a></li>--}}
        {{--<li class="li_power2"><a href="">更新排序</a></li>--}}
        </ul>
    </div>
    {{--<div class="search">--}}
    {{--<form class="form-inline">--}}
    {{--<div class="form-group">--}}
    {{--<label for="exampleInputName2"></label>--}}
    {{--<input type="search" class="form-control" id="exampleInputName2" placeholder="输入搜索内容">--}}
    {{--</div>--}}
    {{--<button type="submit" class="btn btn-success">Search</button>--}}
    {{--</form>--}}
    {{--</div>--}}
    <div class="table_power">
        <table class="table table-bordered">
            <tr class="role_tr_title">
                <td><b>ID</b></td>
                <td><b>类型</b></td>
                <td><b>操作</b></td>
            </tr>
            @foreach($types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>
                        <a href="type-update/{{$type->id}}" class="btn btn-default">修改</a>
                        <a href="type-delete/{{$type->id}}" class="btn btn-danger">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--{{$types->links()}}--}}
    </div>
    <div class="add_power">

    </div>
@endsection