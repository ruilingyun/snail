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
            <li class="li_power">头像修改</li>
        </ul>
    </div>
    <div class="power_title">
        <ul>
            <li class="li_power2"><a href="{{url('admin/personalinfor')}}">个人信息列表</a></li>
            <li class="li_power2"><a href="">批量删除</a></li>
            <li class="li_power2"><a href="">跟新排序</a></li>
        </ul>
    </div>
    <div class="permissionadd_table">
        <table class="table-bordered">
            <form action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                    <tr>
                        <td><b>当前头像</b>:    </td>
                        @foreach($result as $v)
                        <td><img src="{{url($v->avatar)}}" alt="" style="width: 100px;" class="img-circle"></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>头像</b>:   </td>
                        <td><b><input type="file" class="form-control" name="avatar"></b></td>
                    </tr>
                    <tr>
                        <td><b>格式</b>:  </td>
                        <td>仅支持JPG PNG格式,文件小于5M.(使用高质量图片,可生成高清头像)</td>
                    </tr>

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