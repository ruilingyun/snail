@extends('layouts/admin/master')
@section('title', '后台管理系统-个人中心')


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
            <li class="li_power"><a href="{{url('admin/personal-infor')}}">个人中心=></a></li>
            <li class="li_power">个人中心信息</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/permission-list')}}">个人信息列表</a></li>
            <li class="li_power2"><a href="">批量删除</a></li>
            <li class="li_power2"><a href="">跟新排序</a></li>
        </ul>
    </div>
    <div class="permissionadd_table">
        <table class="table-bordered">
            <form action="" method="post">
                {{csrf_field()}}
                @foreach($result as $v)
                <tr>
                    <td><b>姓名</b>:   </td>
                    <td><b><input type="text" class="form-control" name="iname" value="{{$v->iname}}"></b></td>
                </tr>
                <tr>
                    <td><b>年龄</b>:   </td>
                    <td><input type="text" class="form-control" name="age"value="{{$v->age}}"></td>
                </tr>
                <tr>
                    <td><b>性别</b>:   </td>
                    <td>
                        <label for="" style="margin-left: 50px;"><input type="radio" class="form-control" name="sex" value="1">男</label>
                        <label for="" style="margin-left: 100px;"><input type="radio" class="form-control" name="sex" value="2">女</label>
                    </td>
                </tr>
                <tr>
                    <td><b>手机号</b>:   </td>
                    <td><input type="text" name="phone" class="form-control" value="{{$v->phone}}"></td>
                </tr>
                <tr>
                    <td><b>QQ号</b>:    </td>
                    <td><input type="text" name="QQ" class="form-control" value="{{$v->QQ}}"></td>
                </tr>
                <tr>
                    <td><b>生日</b>:  </td>
                    <td><input type="date" name="date" class="form-control" value="{{$v->date}}"></td>
                </tr>
                <tr>
                    <td><b>个人简介</b>:    </td>
                    <td><textarea id="" cols="20" rows="3" name="notice" placeholder="{{$v->notice}}"></textarea></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                        <a href="{{url('admin/personal-infor')}}" class="btn btn-primary">返回</a>
                    </td>
                </tr>
            </form>
        </table>
    </div>
@endsection