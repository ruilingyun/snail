@extends('layouts/admin/master')
@section('title', '后台管理系统-添加广告')
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
    .permissionadd_table{
        margin-top: 30px;
        margin-left: 250px;
        width:1000px;
        height: 100px;
    }
    .table-bordered{
        width: 800px;
    }

</style>
@section('content')
    <div class="power_title">
        <ul>
            <li class="li_power"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_power"><a href="{{url('admin/permission-list')}}">广告管理=></a></li>
            <li class="li_power">添加广告</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/advert-list')}}">广告列表</a></li>
            <li class="li_power2"><a href="">批量删除</a></li>
            <li class="li_power2"><a href="">更新排序</a></li>
        </ul>
    </div>
    <div class="permissionadd_table">
        <table class="table-bordered">
            <form action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <tr>
                    <td><b>广告图片</b>:   </td>
                    <td><input type="file" name="icon" class="form-control" placeholder="Role name" ></td>
                </tr>

                <tr>
                    <td><b>赞助商</b>:   </td>
                    <td><input type="text" name="name" class="form-control" placeholder="Sponsor name" ></td>
                </tr>

                <tr>
                    <td><b>状态</b>:   </td>
                    <td>
                        <label for=""><input type="radio" name="status" value="1">上架</label>
<<<<<<< HEAD
                        <label for=""><input type="radio" name="status" value="2">下架</label>
=======
                        <label for=""><input type="radio" name="status" value="2">上架</label>
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                        <a href="{{url('admin/advert-list')}}" class="btn btn-primary">返回</a>
                    </td>
                </tr>
            </form>
        </table>
    </div>
@endsection