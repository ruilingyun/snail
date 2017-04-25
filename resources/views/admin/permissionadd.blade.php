@extends('layouts/admin/master')
@section('title', '后台管理系统-新增权限')
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
    .add_select{
        width: 150px;
        display: block;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
</style>
@section('content')
    <div class="power_title">
        <ul>
            <li class="li_power"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_power"><a href="{{url('admin/permission-list')}}">权限管理=></a></li>
            <li class="li_power">新增权限</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/permission-add')}}">新增权限</a></li>
            <li class="li_power2"><a href="">批量删除</a></li>
            <li class="li_power2"><a href="">跟新排序</a></li>
        </ul>
    </div>
    <div class="permissionadd_table">
        <table class="table-bordered">
            <form action="" method="post">
                {{csrf_field()}}
            <tr>
                <td><b>分类</b>:   </td>
                <td><select class="add_select">
                            <option value="" selected><--请选择--></option>
                            <option>查看权限</option>
                            <option>修改权限</option>
                            <option>删除权限</option>
                            <option>管理权限</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>权限路由</b>:   </td>
                <td><input type="text" class="form-control" placeholder="Privilege routing" name="name"></td>
            </tr>
            <tr>
                <td><b>权限名称</b>:   </td>
                <td><input type="text" class="form-control" placeholder="Authority description" name="display_name"></td>
            </tr>
            <tr>
                <td><b>描述</b>:   </td>
                <td><textarea class="form-control" rows="3" name="description"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                    <a href="{{url('admin/permission-list')}}" class="btn btn-primary">返回</a>
                </td>
            </tr>
            </form>
        </table>
    </div>
@endsection