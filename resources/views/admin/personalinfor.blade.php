@extends('layouts.admin.master')
@section('title', '后台管理系统-管理员个人中心')
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
            <li class="li_power"><a href="{{url('admin/permissionList')}}">个人中心=></a></li>
            <li class="li_power">个人信息中心</li>
        </ul>
    </div>
    <div class="power_title">
        {{--<ul>--}}
        {{--<li class="li_power2"><a href="{{url('admin/user-add')}}">新增用户</a></li>--}}
        {{--<li class="li_power2"><a href="">批量删除</a></li>--}}
        {{--<li class="li_power2"><a href="">更新排序</a></li>--}}
        {{--</ul>--}}
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
                <td><b>头像</b></td>
                <td><b>名称</b></td>
                <td><b>年龄</b></td>
                <td><b>性别</b></td>
                <td><b>手机号</b></td>
                <td><b>QQ号</b></td>
                <td><b>生日</b></td>
                <td><b>个人简介</b></td>
                <td><b>操作</b></td>
            </tr>
            @foreach($result as $value)
                <tr>
                    <td>{{$value->uid}}</td>
                    <td><a href="icon-update/{{$value->uid}}"><img src="{{url($icon)}}" alt="" style="width: 100px;"></a></td>
                    <td>{{$value->iname}}</td>
                    <td>{{$value->age}}</td>
                    <td>
                        @if($value->sex == 1)
                            男
                        @else
                            女
                        @endif
                    </td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->QQ}}</td>
                    <td>{{$value->date}}</td>
                    <td>{{$value->notice}}</td>
                    <td>
                        {{--<a href="personal-delete/{{$value->uid}}" class="btn btn-danger">删除</a>--}}
                        <a href="personal-update/{{$value->uid}}" class="btn btn-default">修改</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--{{$result->links()}}--}}
    </div>
    <div class="add_power">

    </div>
@endsection