@extends('layouts.home.accountSet')
@section('title','个人信息 微博-随时随地发现新鲜事')
<script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>
<style>
    #l1{background-color: #fff;}
    #l1 span{color: #E64141}
    .span-1{margin-left: 200px;color: #808080}
    .submit{background-color: #FFA00A;border: none;color: #FFFFFF;margin-left: 63px;margin-top: 10px}
    /*下拉*/
    #navenc ul{display:none;}
    .form-1{
        width: 788px;
        padding: 30px;
        margin-left: -40px;
        border:1px solid #999;
        background-color:#fff;
    }
    .form-p2{color: #808080;font-size: 12px}

</style>
<script>
    $(function(){
        $('#navenc p').click(function(){
            //当前p的下一个ul做下拉切换，其他的ul全部关闭
//            alert(1);
            $(this).next('ul').slideToggle().siblings('ul').slideUp();
        })
    })
</script>
@section('content')
    {{--右边部分--}}
    <div class="main-right" id="navenc">
        <div class="right-1"><span class="span-0">我的信息</span><a href="">预览我的主页</a></div>
        <p class="right-2"><span class="span-0">登录名</span><span class="span-1">&nbsp;&nbsp; {{Auth::user()->email}}</span><i>修改密码</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="pwd-update/{{Auth::user()->id}}" class="form-1" method="post">
                {{csrf_field()}}
                <p>原密码: <input type="password" name="oldpassword" placeholder="请输入原密码"></p>
                <p>新密码: <input type="password" name="password" placeholder="请输入新密码"></p>
                <p>确认密码: <input type="password" name="password_confirmation" placeholder="请验证密码"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">手机号</span><span class="span-1">&nbsp;@if(empty($result->phone)) 请完善手机号码 @else {{($result->phone)}} @endif</span><i>查询</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>@if(empty($result->phone))   还未填充手机号,快去完善个人资料吧 @else 手机号码: {{($result->phone)}} @endif</p>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">昵称</span><span class="span-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{Auth::user()->name}}</span><i>编辑</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="name-update/{{Auth::user()->id}}" class="form-1" method="get">
                {{csrf_field()}}
                <p class="form-p2">现昵称: {{Auth::user()->name}}</p>
                <p>新昵称: <input type="text" name="name"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">个人资料</span><span class="span-1">完善资料,让大家更了解你</span><i>编辑</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="setmass" class="form-1" method="post">
                {{csrf_field()}}
                <p class="form-p2">以下信息将显示在个人资料页,方便大家了解你.</p>
                <p class="form-p2">基本信息</p>
                <p>真实姓名 <input type="text" name="iname" @if(empty($result->iname)) placeholder="请输入姓名" @else placeholder="{{($result->iname)}}" @endif></p>
                <p style="margin-left: 28px">性别 <input type="radio" checked="checked" name="sex" value="1"> 男 <input name="sex" value="0" type="radio"> 女</p>
                <p style="margin-left: 28px">生日 <input type="date" name="date" style="height:30px"> @if(empty($result->date)) <span>请选择生日</span> @else <span>{{($result->date)}}</span> @endif</p>
                <p style="margin-left: 28px">简介 <textarea name="notice" id="" cols="30" rows="3" @if(empty($result->notice)) placeholder="请输入简介" @else placeholder="{{($result->notice)}}"@endif></textarea></p>
                <p class="form-p2">联系信息</p>
                <p style="margin-left: 15px">手机号 <input type="text" name="phone" @if(empty($result->phone)) placeholder="请输入手机号" @else placeholder="{{($result->phone)}}"@endif></p>
                <p style="margin-left: 33px">QQ <input type="text" name="QQ" @if(empty($result->QQ)) placeholder="请输入QQ号" @else placeholder="{{($result->QQ)}}"@endif></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">教育信息</span><span class="span-1">未填写学校</span><i>编辑</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p class="form-p2">教育信息</p>
                <p class="form-p2">填写教育信息,能帮助你在微博上快速找到许久不见的老同学</p>
                <p>学校名称 <input type="text" placeholder="请输入学校"></p>
                <p style="margin-left: 28px">院系 <input type="text" placeholder="请输入院系"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">职业信息</span><span class="span-1">学校</span><i>编辑</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p class="form-p2">职业信息</p>
                <p class="form-p2">填写教育信息,能帮助你在微博上更好的发展自己的职业圈</p>
                <p style="margin-left: 15px">公司名称: <input type="text" placeholder="请输入完整的公司名称"></p>
                <p>部门和职位: <input type="text" placeholder="请输入你所在的部门和职位"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <div class="right-2"><span class="span-0">个人标签</span><span class="span-1">未填写标签</span><i>编辑</i></div>
        <p class="right-2"><span class="span-0">收货地址</span><span class="span-1">未填写收货地址</span><i>编辑</i></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p class="form-p2">收货地址</p>
                <p class="form-p2">如果你在微博活动中获得了奖品,我们将按照以下收货人信息发送奖品,所以请填写真实的收货信息.</p>
                <p class="form-p2">新增收货地址</p>
                <p>收货人姓名 <input type="text" placeholder="填写真实姓名"></p>
                <p>所在地区 </p>
                <p>详细地址: <input type="text"></p>
                <p>邮政编码: <input type="text"></p>
                <p>手机号码: <input type="text"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <div class="right-2"><span class="span-0">个性域名</span><span class="span-1">设置个性域名,让朋友更容易记住</span><i>编辑</i></div>
    </div>
@endsection
