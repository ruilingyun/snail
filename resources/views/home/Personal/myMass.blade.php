@extends('layouts.home.accountSet')
@section('title','个人信息 微博-随时随地发现新鲜事')
<script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>

<style>
    #l1{background-color: #fff;}
    #l1 span{color: #E64141}
    .span-1{margin-left: 200px;color: #808080}
    .submit{background-color: #FFA00A;border: none;color: #FFFFFF;margin-left: 40px}
    /*下拉*/
    #navenc ul{display:none;}
    .form-1{
        width: 788px;
        padding: 30px;
        margin-left: -40px;
        border:1px solid #999;
        background-color:#fff;
    }

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
        <div class="right-2"><span class="span-0">登录名</span><span class="span-1">&nbsp;&nbsp; 188****111</span><a href="">修改密码</a></div>
        <div class="right-2"><span class="span-0">手机号</span><span class="span-1">&nbsp;&nbsp; 188****111</span><a href="">查看</a></div>
            <p class="right-2"><span class="span-0">昵称</span><span class="span-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; xxxx</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>现昵称: XXXXX</p>
                <p>新昵称: <input type="text"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">个人资料</span><span class="span-1">完善资料,让大家更了解你</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-2">
                <p>以下信息将显示在个人资料页,方便大家了解你.</p>
                <p>基本信息</p>
                <p>真实姓名: <input type="text"></p>
                <p>所在地</p>
                <p>性别 <input type="radio"> 男 <input type="radio"> 女</p>
                <p>生日 <input type="date"></p>
                <p>血型 <input type="text"></p>
                <p>简介 <textarea name="" id="" cols="30" rows="3"></textarea></p>
                <p>联系信息</p>
                <p>博客地址 <input type="text"></p>
                <p>MSN <input type="text"></p>
                <p>QQ <input type="text"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">教育信息</span><span class="span-1">未填写学校</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>教育信息</p>
                <p>填写教育信息,能帮助你在微博上快速找到许久不见的老同学</p>
                <p>学校名称: <input type="text" placeholder="请输入学校"></p>
                <p>院系: <input type="text" placeholder="请输入院系"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">职业信息</span><span class="span-1">学校</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>职业信息</p>
                <p>填写教育信息,能帮助你在微博上更好的发展自己的职业圈</p>
                <p>公司名称: <input type="text" placeholder="请输入完整的公司名称"></p>
                <p>部门和职位: <input type="text" placeholder="请输入你所在的部门和职位"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <div class="right-2"><span class="span-0">个人标签</span><span class="span-1">未填写标签</span><a href="">编辑</a></div>
        <p class="right-2"><span class="span-0">收货地址</span><span class="span-1">未填写收货地址</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>收货地址</p>
                <p>如果你在微博活动中获得了奖品,我们将按照以下收货人信息发送奖品,所以请填写真实的收货信息.</p>
                <p>新增收货地址</p>
                <p>收货人姓名 <input type="text" placeholder="填写真实姓名"></p>
                <p>所在地区 </p>
                <p>详细地址: <input type="text"></p>
                <p>邮政编码: <input type="text"></p>
                <p>手机号码: <input type="text"></p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <div class="right-2"><span class="span-0">个性域名</span><span class="span-1">设置个性域名,让朋友更容易记住</span><a href="">编辑</a></div>
    </div>

@endsection
