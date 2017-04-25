@extends('layouts.admin.master')
@section('title', '后台管理系统-链接管理')
<style>
    .power_title{
        width: 100%;
        height: 30px;
        line-height: 30px;
        border-bottom: 1px solid pink;
    }
    .li_power{
        list-style: none;
        float: left;
        height: 30px;
    }
    .li_power2{
        list-style: none;
        float: left;
        margin-left: 40px;
        height: 30px;
    }
    .table_power{
        margin-top:50px;;
        width: 1000px;
        margin-left: 250px;

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
            <li class="li_power">链接列表</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/link-add')}}">新增链接</a></li>
        </ul>
    </div>
    <div class="search">
        <form class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2"></label>
                <input type="search" class="form-control" id="exampleInputName2" placeholder="输入搜索内容">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>
    <div class="table_power">
        <table class="table table-bordered">
            <tr class="role_tr_title">
                <th>ID</th>
                <th>网站名</th>
                <th>网站地址</th>
                <th>操作</th>
            </tr>
            @foreach($links as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->links_name}}</td>
                    <td>{{$value->link_address}}</td>
                    <td>
                        <a href="{{url('admin/link-update'.'/'.$value->id)}}">修改</a>
                        <a href="{{url('admin/link-delete'.'/'.$value->id)}}">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="add_power">

    </div>
@endsection