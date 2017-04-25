@extends('layouts/admin/master');
@section('title', '后台管理系统-分配权限')
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
    .li_power2 {
        list-style: none;
        float: left;
        margin-left: 40px;
        height: 30px;
    }
    .table_power{
        margin-top:50px;
        width: 1000px;
        margin-left: 250px;
    }
    tr:hover{
        background-color: #d7ebf6;
    }
</style>
@section('content')
    <div class="power_title">
        <ul>
            <li class="li_power"><a href="{{url('admin/index')}}">首页=></a></li>
            <li class="li_power"><a href="{{url('admin/role-list')}}">管理员管理=></a></li>
            <li class="li_power">分配权限</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/role-add')}}">新增管理员</a></li>
        </ul>
    </div>
    <div class="table_power">
        <table class="table table-bordered">
            <form  class="form-inline" action="{{url('admin/allot-role').'/'.$user_id}}" method="post">
                {{csrf_field()}}
                <tr>
                    <td><b>分配权限</b>:</td>
                    <td>  @foreach($roles as $role)
                            <div class="checkbox">
                                <label><input type="checkbox" name="role_id[]" value="{{$role->id}}">{{$role->display_name}}</label>
                            </div>
                        @endforeach</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-success" value="提交" style="width: 100px">
                        <a  type="button" class="btn btn-info" onclick="history.go(-1)">返回</a>
                    </td>
                </tr>

            </form>
        </table>
    </div>


@endsection