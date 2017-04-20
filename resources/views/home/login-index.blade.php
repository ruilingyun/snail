@extends('layouts/home/masterL')
@section('title','我的首页 微博-随时随地发现新鲜事')
<style>
    .right-all{
        width: 200px;
        /*background-color: #888888;*/
        /*margin-left: 20px;*/
        float: left;
    }
    .right-nav{
        width: 200px;
        height: 200px;
        background-color: #FFFFFF;
    }
    .fancer{
        float: left;
        list-style: none;
        margin-left: 4px;
    }
    p{
        text-align: center;
    }
    .ad1{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .ad2{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .ad3{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .publish{
        width: 600px;
        background-color: #FFFFFF;
    }
    .f_nav{
        width: 600px;
        height: 35px;
    }
    .img-circle{margin-top: 20px}
    li{
        list-style: none;
    }
    .f-left{
        float: left;
        line-height: 35px;
        color: #1A7FB5;
        margin-top: 10px;
        font: 16px 楷体;
    }
    .f-right{
        float: right;
        line-height: 35px;
        color: #EB7350;
        font: 16px 楷体;
        margin-top: 10px;
        margin-right: 20px;
    }
    .input-nav{
        /*margin-top: 20px;*/
        width: 600px;
        height: 74px;
        /*border: #3b3b3b solid 1px;*/
    }
    .assortment-nav{
        width: 600px;
        height: 35px;
    }
    .assortment{
        float: left;
        margin-left: 10px;
        color: black;
    }
    .abc{
        color: black;
    }
    .btn{
        float: right;
        margin-right: 20px;
    }
    .input-shu{
        width: 560px;
        height: 74px;
        margin-left: 20px;
        background-color: #FFFFFF;
        border: black solid 1px;
    }
    .assortment-all{
        width: 600px;
        height: 40px;
        background-color: #FFFFFF;
    }
    .assortment-all1{
        float: left;
        margin-left: 15px;
        line-height: 40px;
    }
    .form-inline{
        float: right;
    }
    .content-all{
        width: 600px;
        height: 800px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }

</style>
<link rel="stylesheet" href="home/css/reset.css">
<link rel="stylesheet" href="home/js/xml.js">
<link rel="shortcut icon"type="image/x-icon" href="image/favicon.ico"media="screen" />

@section('content')
    <div class="publish">
        <div class="f_nav">
            <ul>
                <li class="f-left">有什么新鲜事想告诉大家?</li>
                <li class="f-right">可发300字微博</li>
            </ul>
        </div>
        {{--<form action="">--}}
        <div class="input-nav">
            <textarea class="input-shu" rows="3" id="text"></textarea>
        </div>
        <div class="assortment-nav">
            <ul>
                <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe502;</span>表情</a></li>
                <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe658;</span>图片</a></li>
                <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe613;</span>视频</a></li>
                <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe618;</span>话题</a></li>
                <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe67c;</span>头条文章</a></li>
            </ul>
            <input type="button" class="btn btn-info" id="ipt" value="发布">
        </div>
        {{--</form>--}}
    </div>
    <div class="assortment-all">
        <ul>
            <li class="assortment-all1"><a href="" class="abc">全部</a></li>
            <li class="assortment-all1"><a href="" class="abc">原创</a></li>
            <li class="assortment-all1"><a href="" class="abc">图片</a></li>
            <li class="assortment-all1"><a href="" class="abc">视频</a></li>
            <li class="assortment-all1"><a href="" class="abc">音乐</a></li>
            <li class="assortment-all1"><a href="" class="abc">文章</a></li>
        </ul>
        <form class="form-inline">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="输入搜索内容">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    <div class="content-all" id="txt"></div>
@endsection
@section('right')
    <div class="right-all">
        <div class="right-nav">
            <p><a href="personalCenter"><img src="{{url(Auth::user()->avatar)}}" alt="" class="img-circle" width="60px" height="60px"></a></p>
            <p>{{Auth::user()->name}} <span class="iconfont">&#xe688;</span></p>
            <p>
                <ul>
                <li class="fancer"><p>66</p><p>关注</p></li>
                <li class="fancer">|</li>
                <li class="fancer"><p>1596</p><p>粉丝</p></li>
                <li class="fancer">|</li>
                <li class="fancer"><p>151</p><p>微博</p></li>
                </ul>
            </p>
        </div>
        <div class="ad1"></div>
        <div class="ad2"></div>
        <div class="ad3"></div>
    </div>


    <script>
        var ipt = document.getElementById("ipt");
        var txt = document.getElementById('txt');
        var textarea = document.getElementById("text");
        ipt.onclick = function(){
            var textValue = textarea.value.LTrim();
            textarea.value="";
            if(textValue.length>0 ){
                var divs = document.createElement("div");
                var imgs = document.createElement("img");
                var ps = document.createElement("p");
                var inputs = document.createElement("input");
                divs.setAttribute("class","creatediv");
                imgs.setAttribute('class',"createimg");
                ps.setAttribute("class","createdivs");
                inputs.setAttribute("class","createinput");
                imgs.src="{{url('/home/image/2.jpg')}}";
                inputs.type="button";
                inputs.value="删除";
                ps.innerHTML=textValue;
                divs.appendChild(imgs);
                divs.appendChild(ps);
                divs.appendChild(inputs);
                if(txt.children.length==0){
                    txt.appendChild(divs);

                }else{
                    txt.insertBefore(divs,get_firstChild(txt))
                }
                inputs.onclick = function(){
                    this.parentNode.parentNode.removeChild(this.parentNode)
                }
            }



        }
    </script>
@endsection