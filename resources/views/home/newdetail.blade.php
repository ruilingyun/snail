<!DOCTYPE html>

<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    {{--css--}}
    <link rel="stylesheet" href="/home/css/personal.css">
    <link rel="stylesheet" href="/home/css/iconfont/iconfont.css">
    <title>@yield('title', '个人中心界面')</title>
    <script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>

    {{--<link rel="stylesheet" href="{{url('home/css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="{{url('home/css/bootstrap.min.css')}}">
    {{--<link rel="stylesheet" href="{{url('home/css/bootstrap.css/bootstrap.min.css')}}">--}}
</head>
<style>
    /*头部CSS*/
    body{background-color: #D4D5E0;}
    .navbar{background-color:#FFFFFF;border-bottom: none}
    .navbar-form{margin-right: 100px}
    .img-a{margin-left: 50px}
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
        width:140px;
        height: 30px;
        list-style: none;
        float:left;
        margin-left: -30px;
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
    .ulul2 li{width: 90px;height: 30px;margin-left: -30px;line-height: 30px}
    .ulul2 a{text-decoration: none}
    /*搜索框*/
    .search-t{width: 400px;height: 28px;outline-style: none}
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
    /*左侧导航栏css*/
    /*.container-fluid{margin-left: 200px}*/
    .main-div{height: 900px;width: 150px;position: fixed;left: 190px;margin-top: 50px}
    .row ul{background-color: #A4AABF;height: 600px;}
    .row a{color: white;font-size: 18px}
    .row li{width: 150px;height: 32px;margin-top: 12px; background-color: #A6ACBC;font: 17px 宋体;text-align: center
    }
    /*搜索框*/
    .search-t{width: 400px;height: 28px;outline-style: none}
    .ulul1 li{
        width:130px;
        height: 30px;
        list-style: none;
        /*float:left;*/
        margin-left: -40px;
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
    body{
        background-image: url('/home/image/homeBG.jpg');
        background-repeat: no-repeat;
        background-color: #080808;
    }
    /*中间中*/
    .main-cen{width: 600px;height:1000px;float: left;margin-top: 60px}
    /*中间右部*/
    .main-rig{width: 200px;float: left;margin-top: 70px;margin-left: 10px}
    /*底部css*/
    .bottom-div{background-color:#FAFAFA;width: 970px;margin:0 auto; margin-top: px}
</style>
<body>

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
            <a href="" class="img-a"><img src="{{url('home/image/logo.jpg')}}" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" id="ulul">
                <span  id="navlist" style="width: 180px;height: 50px;float: right">

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
                            <a href=""><li> 账号设置</li></a>
                            <a href=""><li> 会员中心</li></a>
                            <a href=""><li> V认证</li></a>
                            <a href=""><li> 账号安全</li></a>
                            <a href=""><li> 隐私设置</li></a>
                            <a href=""><li> 屏蔽设置</li></a>
                            <a href=""><li> 消息设置</li></a>
                            <a href=""><li> 帮助中心</li></a>
                            <a href="{{url('/home/logout')}}"><li> 退出</li></a>
                        </ul>
                    </li>
                    <a href=""><span id="font-c" class="iconfont" style=" margin-top: 15px;margin-left:20px;float:left;color: #F96214;">&#xe669;</span></a>
                </span>
                <li class="lli"><a href="#"><span class="iconfont">&#xe60d;</span> 首页</a></li>
                <li class="lli"><a href="#"><span class="iconfont">&#xe613;</span> 视频</a></li>
                <li class="lli"><a href="#"><span class="iconfont">&#xe501;</span> 发现</a></li>
                <li class="lli"><a href="#"><span class="iconfont">&#xe609;</span> 游戏</a></li>
                {{--登录的用户名--}}
                <li class="lli"><a href="{{url('home/personalCenter')}}"><span class="iconfont">&#xe667;</span>{{Auth::user()->name}}</a></li>
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

{{--中间整体部分--}}
<div>
    <div style="width: 100px; margin: 0 auto; margin-top: 10px; position: fixed; margin-left: 1200px;">
        <a href="{{url('home/login-index')}}" class="btn btn-default">返回上一页</a>
    </div>
    <div style="margin: 0 auto; background-color: #FFFFFF; width: 970px; margin-top: 60px; text-align: center;">
        @foreach($result as $v)
            <p><img src="{{url($v->photos)}}" alt="" style="width:970px;"></p>
            <p><h1>{{$v->title}}</h1></p>
            <p><img src="{{url('home/image/newtitle.jpg')}}" alt=""></p>
            <p><h4>{{$v->content}}</h4></p>
            <p><img src="{{url('home/image/newtitle1.jpg')}}" alt=""></p>
            <p><img src="{{url('home/image/newtitle2.jpg')}}" alt=""></p>
        @endforeach
    </div>
</div>
@show()

{{--底部--}}
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

{{--搜索框下拉--}}
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
</body>
</html>

