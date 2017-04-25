{{--首页模板(未登录)--}}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    {{--css--}}
    <link rel="stylesheet" href="/home/css/personal.css">
    <link href="{{url('home/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>@yield('title', '个人中心界面')</title>
    <script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>
    <link rel="stylesheet" href="css/iconfont/iconfont.css">
    <link rel="stylesheet" href="home/fonts/glyphicons-halflings-regular.ttf">
    <link href="dashboard.css" rel="stylesheet">

</head>
<style>
    /*头部CSS*/
    body{background-color: #D4D5E0;}
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
    /*中间中*/
    .main-cen{width: 570px;height:1000px;background-color:#FFFFFF;float: left;margin-top: 70px}
    /*中间右部*/
    .main-rig{width: 230px;float: left;margin-top: 70px;margin-left: 10px}
    /*底部css*/
    .bottom-div{background-color:#FAFAFA;width: 970px;margin-left: auto;margin-right: auto}
    /*隐藏登录窗口*/
    #slogin{width: 600px;height: 400px;position: fixed;left: 373px;top: 100px;border-top: 2px solid #FA7F40; display: none;background-color: #FFFFFF;box-shadow: 0px 2px 3px rgba(34, 25, 25, 0.5);}
    .login-main1{width: 400px;margin: auto;}
    .login-top{width: 200px;height: 33px;float: left;text-align: center;line-height: 33px;margin-top: 30px;margin-bottom: 30px;font-size: 18px}
    .form-n input{width:200px;height: 34px;margin-top: 10px}
    .lo-a{background-color: #FFFFFF;width: 200px;height: 34px;margin-left: 10px;margin-top: 20px;text-align: center;line-height: 34px}
    .d-submit{width: 200px;height: 34px;background-color: #F7671D;color: white;border: none;margin-left: 10px;margin-top: 10px}
    .log-q{width: 200px;margin: auto;margin-top: 20px}
    .log-q a{margin-left: 25px}
    #tuichu{margin-left: 470px;margin-top: 15px;font-size: 20px;color: #0c5ea7;cursor: pointer}
    #tuichu:hover{color: red}
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
                <li class="lli"><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                <li class="lli"><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> 视频</a></li>
                <li class="lli"><a href="#"><span class="glyphicon glyphicon-zoom-in"></span> 发现</a></li>
                <li class="lli"><a href="#"><span class="glyphicon glyphicon-globe"></span> 游戏</a></li>
                <li class="lli"><a href="register" class="user">注册</a></li>
                <li class="lli" style="margin-top: 13px">|</li>
                <li class="lli" id="login"><a href="#" class="register" >登录</a></li>
            </ul>
            <form class="navbar-form navbar-right" style="margin-right: 80px">
                <div id="navlist">
                <li class="lia">
                <input type="text" class="search-t"  placeholder="大家都在搜:人民的名义...">
                    {{--搜索下拉框--}}
                    <ul class="ulul1">
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
<div style="height: 2000px">
    <div style="width: 810px;margin: auto;height: 1000px;margin-left: 350px">
    {{--左侧导航栏--}}
    <div class="main-div">
        <div class="container-fluid">
            <div class="row">
                        <ul class="nav nav-sidebar">
                            <li><a href="#"><span class="glyphicon glyphicon-fire"></span> 热门</a></li>
                            <li><a href="#">· 明星</a></li>
                            <li><a href="#">· 搞笑</a></li>
                            <li><a href="#">· 社会</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> 视频</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-ok-circle"></span> 头条 <span style="background-color:orangered;margin-right: -35px">HOT</span></a></li>
                            <li><a href="#">· 情感</a></li>
                            <li><a href="#">· 时尚</a></li>
                            <li><a href="#">· 军事</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-star"></span> 榜单 <span style="background-color:lightblue;margin-right: -35px">NEW</span></a></li>
                        </ul>
            </div>
        </div>
</div>
    {{--右侧内容--}}
    <div class="main-cen">
        @yield('content')
    </div>
    {{--最右侧--}}
    <div class="main-rig">
        @yield('right')
    </div>
</div>

</div>
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
{{--隐藏登录窗口--}}
<div id="slogin">
    <div class="login-main1">
        <span href="" id="tuichu">X</span>
        <div class="login-top">账号登录</div>
        <div class="login-top">安全登录</div>
        <form action="{{url('/home/doLogin')}}" method="post" style="width: 230px;height: 350px;margin: auto;">
            {{csrf_field()}}
            <span class="form-n"><span class="glyphicon glyphicon-user"></span> <input type="email" name="email" placeholder="请输入邮箱"></span>
            <span class="form-n"><span class="glyphicon glyphicon-lock"></span> <input type="password" name="password" placeholder="请输入密码"></span>
            <p style="font-size: 10px;color: #A9A9A9;margin-top: 10px">
                <a href="" style="float: right;margin-right: 20px">忘记密码</a>
            </p>
            <input type="submit" value="登录" class="d-submit">
           <a href="" style="text-decoration: none"> <p class="lo-a"><span class="iconfont" style="font-size: 16px">&#xe668;</span>使用QQ直接登录</p></a>
            <p class="log-q"><a href="register">立即注册</a><a href="">短信登录</a></p>
        </form>
    </div>
</div>
<script>
    $(function(){
        $('#login').click(function(){
            $('#slogin').css('display','block');
        })
        $('#tuichu').click(function(){
            $('#slogin').css('display','none');
        })
    })
</script>

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

