{{--首页--}}
@extends('layouts.home.master')
@section('title','微博-随时随地发现新鲜事')
@section('content')
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
    <div>新闻</div>
@endsection
@section('right')
    <style>
        .ri-login{width: 230px;height: 286px;background-color: #fff;}
        .ri-main{width: 210px;margin: auto}
        .ri-login1{width: 105px;height: 33px;float: left;text-align: center;line-height: 33px;border-bottom: 1px solid red}
        .form-m{width: 190px;height: 34px;}
        .form-m span{width: 20px;height: 33px;margin-left: 10px;line-height: 34px;margin-top: 10px}
        .form-m input{width: 172px;height: 34px;}
        .f-submit{width: 190px;height: 34px;background-color: #F7671D;color: white;border: none;margin-left: 10px;margin-top: 10px}
        /*热门话题*/
        .hot{width: 230px;height: 300px;background-color: #FFFFFF;margin-top: 10px}
        .hot p{margin-left: 10px}
        .hot-a1{color: #808080}
        .hot-a1:hover{color: #EB7350}
        /*微博找人*/
        .fond-r{width: 230px;height: 600px;background-color: #FFFFFF;margin-top: 10px}
    </style>
<div class="ri">
    {{--登录框--}}
    <div class="ri-login">
        <div class="ri-main">
            <div>
               <span class="ri-login1"><a href="" class="login-a">账号登录</a></span>
               <span class="ri-login1"><a href="" class="login-a">安全登录</a></span>
            </div>
            <form action="{{url('home/doLogin')}}" method="post">
                {{csrf_field()}}
                <span class="form-m"><span class="glyphicon glyphicon-user"></span><input type="eamil" name="email" placeholder="请输入邮箱"></span>
                <span class="form-m"><span class="glyphicon glyphicon-lock"></span><input type="password" name="password" placeholder="请输入密码"></span>
                <p style="font-size: 10px;color: #A9A9A9;margin-top: 10px">
                    <a href="" style="float: right;margin-right: 10px">忘记密码</a>
                </p>
                <input type="submit" value="登录" class="f-submit">
            </form>
            <div style="border-bottom: 1px solid black;margin-top: 10px">
            <p style="font-size: 12px;color: #808080;margin-left: 10px">还没有微博?<a href="{{url('home/register')}}" style="color: #EB7350">立即注册!</a></p>
            </div>
            <p style="margin-top: 10px;font-size: 12px;color: #808080;margin-left: 10px">其他登录:XXX</p>
        </div>
    </div>
    {{--热门微博--}}
    <div class="hot">
        <p style="border-bottom: 1px solid #808080"> 热门话题</p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
        <p><a href="" class="hot-a1">#天真人类</a><p></p></p>
    </div>
    {{--微博找人--}}
    <div class="fond-r" style="background-color: greenyellow;">
        <p style="border-bottom: 1px solid #808080;text-align: center"><b>友情链接</b></p>
        @foreach($link as $value)
            <div style="width: 230px;height: 50px;text-align: center;line-height: 50px;font-size: 20px">
                <a href="http://{{$value->link_address}}">{{$value->links_name}}</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
