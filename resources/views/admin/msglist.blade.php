@extends('layouts.admin.master')
@section('title', '后台管理系统-新闻管理')
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
            <li class="li_power"><a href="{{url('admin/permissionList')}}">新闻管理=></a></li>
            <li class="li_power">微博列表</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/msg-publish')}}">发布微博</a></li>
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
                <td><b>ID</b></td>
                <td><b>发布者</b></td>
                <td><b>微博内容</b></td>
                <td><b>类别</b></td>
                <td><b>热销</b></td>
                <td><b>操作</b></td>
            </tr>
            @foreach($result as $rel)
                <tr>
                    <td>{{$rel->id}}</td>
                    <td>我yu世界只差一个妳</td>
                    <td>{{$rel->content}}</td>
                    <td>{{$rel->type}}</td>
                    <td>
                        @if($rel->is_hot == 1)
                            <a href="is-hot/{{$rel->id}}" class="btn btn-default">热门</a>
                        @elseif($rel->is_hot == 2)
                            <a href="not-hot/{{$rel->id}}" class="btn btn-default">非热门</a>
                        @endif
                    </td>
                    <td>
                        <a href="msg-update/{{$rel->id}}" class="btn btn-default">修改</a>
                        <a href="msg-delete/{{$rel->id}}" class="btn btn-default">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--{{$result->links()}}--}}
    </div>
    <div class="add_power">

    </div>
@endsection