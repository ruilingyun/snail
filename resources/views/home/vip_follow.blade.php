<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>
    <link rel="stylesheet" href="{{url('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('home/css/iconfont/iconfont.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '我的关注')</title>
    <style>
        .navbar{background-color:#FFFFFF;border-bottom: none}
        .navbar-form{margin-right: 100px}
        .img-a{margin-left: 50px}
        #ulul{margin-right: 100px}
        #navbar a:hover{color: #FF6600}
        /*左侧导航栏css*/
        /*.container-fluid{margin-left: 200px}*/
        .main-div{height: 900px;width: 150px;position: fixed;left: 190px;margin-top: 50px}
        .row ul{background-color: #A4AABF;height: 600px;}
        .row a{color: white;font-size: 18px}
        .row li{width: 150px;height: 32px;margin-top: 12px; background-color: #A6ACBC;font: 17px 宋体;text-align: center
        }
        /*搜索框*/
        .search-t{width: 468px;height: 28px;outline-style: none}
        .ulul1 li{
            width:468px;
            height: 30px;
            list-style: none;
            /*float:left;*/
            margin-left: 5px;
            line-height: 30px;
        }
        .ulul1{margin-top: -14px}
        .ulul1 li:hover{
            background-color: #F2F2F5;}
        .ulul1 a{text-decoration: none}
        .lia{list-style: none;float: left}
        #navlist li ul{
            position:absolute;
            top:50px;
            background-color: #fff;
            width:468px;
            border-top:none;
            display:none;
            list-style: none;
        }

        *{
            margin:0;
            padding:0;
        }
        li{
            list-style:none
        }
        a{
            color: black;
            text-decoration: none;
        }
        #personal_main{
            background-image: url('/home/image/homeBG.jpg');
            background-repeat: no-repeat;
            background-color: #080808;
            /*background-color: lightseagreen;*/
        }
        .page_center{
            background-image: url("{{url('home/image/beij1.jpg')}}");
            width: 920px;
            /*min-height: 1000px;*/
            margin: 0 auto;
            padding: 16px 0 0 0;
        }
        .page_center .page_top{
            width: 920px;
            height: 356px;
        }
        .page_center .page_top .page_top_info{
            position: absolute;
            width: 920px;
            height: 300px;
            margin-top: 50px;

        }
        .page_center .page_top .page_top_info .personal_icon{
            position: relative;
            width: 100px;
            height: 100px;
            margin: 48px auto 0;
            padding: 4px;
            margin-top: 40px;
            text-align: center;
        }
        .page_center .page_top .page_top_info .personal_name{
            width: 920px;
            height: 28px;
            margin-top: 10px;
            text-align: center;
            vertical-align: text-bottom;
            line-height: 28px;
            color: black;
            font-size: 20px;
        }
        .page_center .page_top .page_top_info .personal_introduce{
            width: 920px;
            height: 18px;
            margin-top: 8px;
            text-align: center;
            color: black;
            line-height: 14px;
        }
        .page_center .page_top .page_top_nav{
            position: absolute;
            margin-top: 320px;
            width: 920px;
            height: 40px;
            background-color: #fff;
        }
        .page_center .page_top .page_top_nav li{
            width: 184px;
            height: 40px;
            padding: 10px;
            text-align: center;
        }
        .page_center .page_top .page_top_nav .li_left{
            margin-left: 184px;
        }
        .page_center .page_middle{
            margin-top: 20px;
        }
        #lis{
            margin-left: 95px;
            cursor: pointer;
        }

        .mycolor:hover{
            color: #FFFFFF;
        }
        .bottom-div{background-color:#FAFAFA;width: 970px;margin:0 auto; margin-top: px}

        /*补充css*/
        .navbar{background-color:#FFFFFF;border-bottom: none}
        .navbar-form{margin-right: 100px}
        .img-a{margin-left: 50px}
        /*#ulul{margin-right: 180px}*/
        #navbar a:hover{color: #FF6600}

        body{background-color: #B0D7EE;}
        .main{width: 970px;margin-left: auto;margin: 80px auto;background-color: #FAFAFA;}
        .main-left{background-color: #F1F1F1;width: 150px;float: left}
        .main-right{width: 790px;float: left;margin-left: 20px}
        .main-left legend{font-size: 16px;text-align: center}
        .left-1{width: 150px;height: 35px;text-align: center;line-height: 35px;color: #333333;margin-top: 10px;}
        .left-1:hover{background-color: #818287;}
        .left-1 span{color: #717378;}
        .right-2:hover{background-color: #FAFAFA;}
        .right-2{background-color: #F1F1F1;width: 788px;height: 40px;line-height: 40px;margin-top: 10px;border: 0.5px solid #D9D9D9;cursor: pointer}
        .right-1{width: 788px;height: 40px;line-height: 40px;border-bottom: 2px solid red;}
        .right-1 a{float: right}
        .span-0{margin-left: 10px}
        .right-2 a{float: right;margin-right: 10px}
        .main-left a{text-decoration: none}
        .lia{width: 45px;height: 50px;position: relative; float: left }
        .ulul1 li{
            width:125px;
            height: 30px;
            list-style: none;
            float:left;
            line-height: 30px;
        }
        #navlist li ul{
            position:absolute;
            top:50px;
            background-color: #fff;
            width:100px;
            border-top:none;
            display:none;
            list-style: none;
        }
        .ulul2 li{width: 90px;height: 30px;margin-left: 5px;line-height: 30px;}
        .ulul2 a{text-decoration: none}
        /*搜索框*/
        .search-t{width: 468px;height: 28px;outline-style: none}
        .ulul3 li{
            width:468px;
            height: 30px;
            list-style: none;
            /*float:left;*/
            margin-left: -40px;
            line-height: 30px;
        }
        .ulul3{margin-top: -14px}
        .ulul3 li:hover{
            background-color: #F2F2F5;}
        .ulul3 a{text-decoration: none}
        .lia1{list-style: none;float: left}
        #navlist1 li ul{
            position:absolute;
            top:50px;
            background-color: #fff;
            width:468px;
            border-top:none;
            display:none;
            list-style: none;
        }
        .bottom-div{background-color:#FAFAFA;width: 970px;margin:0 auto;}
        .list-top .list-useravatar{
            width: 60px;
            height: 60px;
            padding: 5px
        }
        .list-top .list-delete{
            width: 40px;
            height: 60px;
            line-height: 60px;
            font-size: 20px;
            margin-right: 10px;
        }
        .list-bottom li{
            width: 147.5px;
            /*height: 40px;*/
            text-align: center;
            font-size: 15px;
            line-height: 40px;
        }
        .list-comment .comment-top{
            width: 598px;
            height: 50px;
        }
        .comment-input textarea{
            width: 500px;
            height: 30px;
            line-height: 25px;
            /*padding: 3px;*/
        }
        .comment-middle-list .comment-middle-list-avatar{
            margin-top: 10px;
            width: 30px;
            height: 30px;
            margin-left: 10px;
        }
        .comment-middle-list-del .comment-del{
            margin-left: 450px;
        }
        .comment-middle-list-del .onclick-reply{
            margin-left: 10px;
        }

    </style>
    <link rel="stylesheet" href="{{url('/home/css/personal.css')}}">
    <link rel="stylesheet" href="{{url('home/css/iconfont/iconfont.css')}}">
</head>
<body>
<div id="personal_main">
    {{--头部--}}
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('home/login-index')}}" class="img-a"><img src="{{url('home/image/logo.jpg')}}" alt=""></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right" id="ulul">
                <span  id="navlist" style="width: 180px;height: 50px;float: right;margin-right: -126px;">
                    <span style="float: left;margin-top: 7px; margin-left:10px; border-right: 1px solid #D9D9D9;width: 1px;height:25px; font-size: 25px" class="iconfont">&#xe612;</span>
                    <li class="lia">
                    <a href=""><span id="fonta" class="iconfont" style="margin-top: 12px; margin-left:50px;float:left;color: #686D77; font-size: 17px;">&#x3434;</span></a>
                        <ul style="width:130px;margin-left: -100px;" class="ulul1">
                            <a href=""><li> @我的</li></a>
                            <a href=""><li> 评论</li></a>
                            <a href=""><li> 赞</li></a>
                            <a href=""><li> 私信</li></a>
                            <a href=""><li> 未关注人私信</li></a>
                            <a href=""><li> 群通知</li></a>
                            <a href=""><li> 消息设置</li></a>
                        </ul>
                    </li>
                    <li class="lia">
                    <a href=""><span id="font-b" class="iconfont" style="margin-top: 15px;margin-left:20px;float:left;color: #686D77;font-size: 18px"></span></a>
                        <ul class="ulul2">
                            <a href="myMass"><li> 账号设置</li></a>
                            <a href=""><li> 会员中心</li></a>
                            <a href=""><li> V认证</li></a>
                            <a href=""><li> 账号安全</li></a>
                            <a href=""><li> 隐私设置</li></a>
                            <a href=""><li> 屏蔽设置</li></a>
                            <a href=""><li> 消息设置</li></a>
                            <a href=""><li> 帮助中心</li></a>
                            <a href="logout"><li> 退出</li></a>
                        </ul>
                    </li>
                    <a href=""><span id="font-c" class="iconfont" style=" margin-top: 15px;margin-left:20px;float:left;color: #F96214;">&#xe669;</span></a>
                </span>
                    <li class="lli"><a href="#"><span class="iconfont">&#xe60d;</span> 首页</a></li>
                    <li class="lli"><a href="#"><span class="iconfont">&#xe613;</span> 视频</a></li>
                    <li class="lli"><a href="#"><span class="iconfont">&#xe501;</span> 发现</a></li>
                    <li class="lli"><a href="#"><span class="iconfont">&#xe609;</span> 游戏</a></li>
                    {{--登录的用户名--}}
                    <li class="lli"><a href="{{url('home/personalCenter')}}"><span class="iconfont">&#xe667;</span> {{Auth::user()->name}} </a></li>
                </ul>
                <form class="navbar-form navbar-right" style="margin-right: 47px">
                    <div id="navlist1">
                        <li class="lia1">
                            <input type="text" class="search-t"  placeholder="大家都在搜:人民的名义...">
                            {{--搜索下拉框--}}
                            <ul class="ulul3">
                                <a href="" style="color: orangered"><li> 查看完整热搜榜>></li></a>
                                <a href=""><li> 1</li></a>
                                <a href=""><li> 2</li></a>
                                <a href=""><li> 3</li></a>
                                <a href=""><li> 4</li></a>
                                <a href=""><li> 5</li></a>
                                <a href=""><li> 6</li></a>
                            </ul>
                        </li>
                        <input type="submit" class="form-control" value="搜索" style="height: 28px;line-height: 12px">
                    </div>
                </form>

            </div>
        </div>
    </nav>
    <div class="page_center">
        <div class="page_top">
            <div class="page_top_info pull-left">
                <div class="personal_icon">

                    <img src="{{url(Auth::user()->avatar)}}" alt="" class="img-circle" width="100px" height="100px">
                </div>
                <div class="personal_name">
                    <p><b>{{Auth::user()->name}}</b><span class="iconfont">&#xe688;</span></p>
                </div>
                <div class="personal_introduce">
                    {{--<p><b>{{$result->notice}}</b></p>--}}

                </div>
            </div>
            <div class="page_top_nav pull-left">
                <ul class="clearfix">
                    <li class="pull-left" id="lis"><a href="{{url('home/personalCenter')}}" class="mycolor">我的主页</a></li>
                    <li class="pull-left" id="lis"><a href="{{url('home/personalImages')}}" class="mycolor">我的相册</a></li>
                    <li class="pull-left" id="lis"><a href="{{url('home/personalManger')}}" class="mycolor">管理中心</a></li>
                </ul>
            </div>
        </div>
        <div class="page_middle">
            <div class="info_left">
                <div class="little_title">

                </div>
            </div>
        </div>
    </div>
    @section('content')
        <div class="vip_fans">
            <div class="fans_list" style="width: 930px;background-color: #fffdef;margin: 0 auto">
                <div class="fans_list_top clearfix" style="width: 930px;height: 40px;background-color: #ccc;">
                    <div class="fans_list_myfans pull-left" style="width: 80px;height: 40px;padding: 5px;line-height: 40px;">我的关注</div>
                    <div class="fans_list_num pull-left" style="width: 20px;height: 40px;padding: 5px;line-height: 40px;"></div>
                </div>
                <div class="fans_list_middle clearfix" style="width: 930px;">
                    @foreach($follow as $value)
                        @if($value->usersby_id==Auth::user()->id)
                            @foreach($users as $value1)
                                @if($value1->id==$value->users_id)
                                    <div class="fans_list_comment pull-left" style="width: 232px;height: 232px;">
                        <div class="fans_list_avatar" style="width: 130px;height: 130px;margin: 0 auto;">
                            <img src="{{url($value1->avatar)}}" alt="" width="130px" height="130px" class="img-circle">
                        </div>
                        <div class="fans_list_name" style="width: 130px;height: 40px;margin: 0 auto;text-align: center; line-height: 40px;font-size: 20px;">
                            {{$value1->name}}
                        </div>
                        <div class="fans_list_btn" style="width: 130px;height: 62px;text-align: center">
                            <button style="width: 80px;height: 40px;margin-left: 75px;background-color: green;">已关注</button>
                        </div>
                    </div>
                                @else
                                @endif
                            @endforeach

                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @show()


    <div class="bottom-div">
        <div class="global_footer S_bg4">
            <div class="clearfix">
                <dl class="list">
                    <dt>找找感兴趣的人</dt>
                    <dd><a href="http://verified.weibo.com/?bottomnav=1">名人堂</a><a href="http://vip.weibo.com/home?bottomnav=1">微博会员</a></dd>
                    <dd><a href="http://club.weibo.com?bottomnav=1">微博达人</a></dd>
                    <dd><a href="http://verified.e.weibo.com/media?bottomnav=1">媒体</a><a href="http://verified.e.weibo.com/brand?bottomnav=1">企业</a><a href="http://gov.weibo.com/government/index.php?bottomnav=1">政府</a></dd>
                </dl>
                <dl class="list">
                    <dt>精彩内容</dt>
                    <dd><a href="http://huati.weibo.com/?bottomnav=1">微话题</a><a href="http://data.weibo.com/top?bottomnav=1">风云榜</a></dd>
                    <dd><a href="http://talk.weibo.com?bottomnav=1">微访谈</a></dd>
                    <dd><a href="http://hot.plaza.weibo.com/?bottomnav=1&amp;type=re&amp;act=day">热门微博</a></dd>
                </dl>
                <dl class="list">
                    <dt>热门应用</dt>
                    <dd><a href="http://weiba.weibo.com?bottomnav=1">微吧</a><a href="http://gongyi.weibo.com/?bottomnav=1">微公益</a></dd>
                    <dd><a href="http://photo.weibo.com?bottomnav=1">相册</a><a href="http://music.weibo.com/t/index.php?bottomnav=1">微音乐</a></dd>
                    <dd><a href="http://vote.weibo.com?bottomnav=1">投票</a><a href="http://game.weibo.com?bottomnav=1">微游戏</a></dd>
                </dl>
                <dl class="list">
                    <dt>手机玩微博</dt>
                    <dd><a href="http://m.weibo.com/web/cellphone.php?bottomnav=1">WAP版</a><a href="http://m.weibo.com/web/cellphone.php?bottomnav=1#msg">短彩发微博</a></dd>
                    <dd><a href="http://m.weibo.com/web/cellphone.php?bottomnav=1#iphone">iPhone客户端</a><a href="http://m.weibo.com/web/cellphone.php?bottomnav=1#ipad">iPad客户端</a></dd>
                    <dd><a href="http://m.weibo.com/web/cellphone.php?bottomnav=1#android">Android客户端</a></dd>
                </dl>
                <dl class="list list_right">
                    <dt>认证&amp;合作</dt>
                    <dd><a href="http://verified.weibo.com/verify?bottomnav=1">申请认证</a><a href="http://open.weibo.com/?bottomnav=1">开放平台</a></dd>
                    <dd><a href="http://e.weibo.com/introduce/introduce?bottomnav=1">企业微博</a><a href="http://open.weibo.com/connect?bottomnav=1">连接网站</a></dd>
                    <dd><a href="http://weibo.com/static/logo?bottomnav=1">微博标识</a><a href="http://tui.weibo.com?bottomnav=1">广告服务</a></dd>
                </dl>
            </div>
            <div class="other_link S_line2 clearfix">
                <div class="help_link">
                    <p><a href="http://ir.weibo.com/?bottomnav=1&amp;wvr=5" class="S_func1"><i class="W_ico16 ico_weibo"></i>关于微博</a>　<a href="http://help.weibo.com/?refer=didao&amp;bottomnav=1" class="S_func1">微博帮助</a>　<a class="S_func1" href="http://weiba.weibo.com/wanzhuanweibo?bottomnav=1">意见反馈</a>　<a class="S_func1" href="http://open.weibo.com/?bottomnav=1">开放平台</a>　<a class="S_func1" href="http://hr.weibo.com?bottomnav=1">微博招聘</a>　<a class="S_func1" href="http://news.sina.com.cn/guide/?bottomnav=1">新浪网导航</a>　<a class="S_func1" href="http://service.account.weibo.com/?bottomnav=1" target="__blank">社区管理中心</a>　<a class="S_func1" href="http://service.account.weibo.com/roles/gongyue?bottomnav=1" target="__blank">微博社区公约</a></p>
                    <p></p>
                    <p class="S_txt2">北京微梦创科网络技术有限公司 <a class="S_func1" href="http://weibo.com/aj/static/jww.html?_wv=5">京网文[2011]0398-130号</a> <a class="S_func1" href="http://www.miibeian.gov.cn" target="_blank">京ICP备12002058号</a></p>
                </div>
                <div class="copy">
                    <p class="W_linkb">
                        <select id="pl_account_changeLanguage">
                            <option value="zh-cn" selected="selected">中文(简体)</option>
                            <option value="zh-tw">中文(台湾)</option>
                            <option value="zh-hk">中文(香港)</option>
                            <option value="en">English</option>
                        </select></p>
                    <p class="S_txt2">Copyright © 2009-2017 WEIBO </p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>

<script>
    var lis = document.getElementById('lis');

    lis.onmouseover = function(){
        this.style.backgroundColor = '#646464';
    }
    lis.onmouseout = function(){
        this.style.backgroundColor = '';
    }

</script>
<script>
    var lis = document.getElementById('navlist').getElementsByTagName('li');

    //为每一个li绑定鼠标事件
    for(var i = 0; i < lis.length; i++){
//        alert(1);
        lis[i].onmouseover = function(){
            //判断是否存在ul
            if(this.getElementsByTagName('ul').length > 0){
                this.getElementsByTagName('ul')[0].style.display = 'block';
            }
        }
        lis[i].onmouseout = function(){
            if(this.getElementsByTagName('ul').length > 0){
                this.getElementsByTagName('ul')[0].style.display = 'none';
            }
            this.style.backgroundColor = "";
        }
    }
</script>
