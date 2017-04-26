{{--首页--}}
@extends('layouts.home.master')
<script src="{{url('/js/jquery-1.8.3.min.js')}}"></script>

@section('title','微博-随时随地发现新鲜事')
<style>
    .new-title{width: 570px;  }
    .weibo-title{margin-top: 10px;}
    .goods{width: 570px;height: 100px; margin: 0 auto; margin-top: 10px; background-color: #FFFFFF; line-height: 100px}
    .goods-image{float: left; list-style: none;}
    .goods-content{float: left; list-style: none;}
</style>
@section('content')
    <div class="new-title">
        <a href=""><img src="{{url('home/image/title.jpg')}}" alt=""></a>
    </div>
    @foreach($goods as $good)
    <div class="goods">
        <ul>
            <li class="goods-image"><img src="{{url($good->photos)}}" alt="" style="width: 140px; height: 80px;"></li>
            <li class="goods-content" style="margin-left: 15px">{{$good->content}}</li>
        </ul>
    </div>
    @endforeach
    <div style="margin-top: 10px;">
        <img src="{{url('home/image/title3.png')}}" alt="">
    </div>

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
        .advert{width: 230px;height: 300px;background-color: #FFFFFF;margin-top: 10px;}
        .hot p{margin-left: 10px}
        /*微博找人*/
        .fond-r{width: 230px;height: 600px;margin-top: 10px;}
        .iframe{widht:230px; height: 300px; margin:0px; padding:0px; width:100%; height:100%; iframeborder:no;}
        .show-advert{width: 230px; height: 30px; background-color: #9acfea;line-height: 30px; margin-top: 10px;}
        .new-content{width: 230px;  height: ;  margin-top: 15px;}
        .new-title{width: 570px;}
        .weibo-title{margin-top: 10px;}
        .new-title{  width: 570px; }
        .weibo-title{  margin-top: 10px; }
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
    {{--<div class="show-advert" id="advert"><a href=""><span class="iconfont">&#xe624;</span><b>广告</b></a></div>--}}
    <div class="advert">
        {{--<b>小广告/轮播图</b>--}}
        <iframe class="iframe" src="{{url('home/lunbotu')}}" scrolling="no"></iframe>
    </div>
    {{--微博找人--}}
    <div style="margin-top: 15px;"><a href=""><img src="{{url('home/image/new-title.jpg')}}" alt=""></a></div>
    <div class="fond-r">
        <div style="background-color: #FFFFFF;">
        <p style="border-bottom: 1px solid #808080">新闻头条</p>
        @foreach($result as $v)
            <p class="new-content" style="font-family: 微软雅黑;"><a href="{{url('admin/new-detail/'.$v->id)}}">#{{$v->title}}#</a></p>
        @endforeach
        </div>
        <p style="margin-top: 10px;"><img src="{{url('home/image/title-r1.png')}}" alt=""></p>
    </div>
</div>


    {{--<script type="text/javascript">--}}
{{--//        var advert = document.getElementById('advert');--}}
        {{--$(function(){--}}
            {{--$('div').click(function(){--}}
                {{--$(this).next('div').slideToggle('fast');--}}
            {{--})--}}
        {{--})--}}
    {{--</script>--}}
@endsection


