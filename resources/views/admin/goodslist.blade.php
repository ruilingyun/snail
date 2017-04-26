@extends('layouts.admin.master')
@section('title', '后台管理系统-商品管理')
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
            <li class="li_power"><a href="{{url('admin/permissionList')}}">商品管理=></a></li>
            <li class="li_power">商品列表</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/goods-add')}}">添加商品</a></li>
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
                <td><b>商品ID</b></td>
                <td><b>图片</b></td>
                <td><b>商品介绍</b></td>
                <td><b>类别</b></td>
                <td><b>状态</b></td>
                <td><b>操作</b></td>
            </tr>
            @foreach($result as $rel)
                <tr>
                    <td>{{$rel->id}}</td>
                    <td><img src="{{url($rel->photos)}}" alt="" style="width: 100px;"></td>
                    <td>{{$rel->content}}</td>
                    <td>{{$rel->type}}</td>
                    <td>
                        @if($rel->status == 1)
                            <a href="down_status/{{$rel->id}}" class="btn btn-default">上架</a>
                        @elseif($rel->status == 2)
                            <a href="up_status/{{$rel->id}}" class="btn btn-danger">下架</a>
                        @endif
                    </td>
                    <td>
                        <a href="goods-update/{{$rel->id}}" class="btn btn-default">修改分类</a>
                        <a href="goods-delete/{{$rel->id}}" class="btn btn-danger">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$result->links()}}
    </div>
    <div class="add_power">

    </div>
@endsection