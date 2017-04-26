@extends('layouts.home.accountSet')
@section('title','隐私设置 微博-随时随地发现新鲜事')
<style>
    #l3{background-color: #fff;}
    #l3 span{color: #E64141}
    .qwe{width: 788px;height: 40px;line-height: 40px; border-bottom: 2px solid red;}

</style>
@section('content')
    <div class="main-right">
        <div class="right-1"><span class="span-0">隐私设置</span></div>
        <div class="right-2"><span class="span-0">何种方式可找到我</span><span class="span-1">电子邮件 手机号码</span><a href="">编辑</a></div>
        <div class="right-2"><span class="span-0">是否推荐通讯录好友</span><span class="span-1" style="margin-left: 184px">是</span><a href="">编辑</a></div>
        <div class="right-2"><span class="span-0">我的位置</span><span class="span-1" style="margin-left: 255px">可见</span><a href="">编辑</a></div>
    </div>
@endsection