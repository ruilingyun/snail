<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '我yu世界只差一个妳的微博_微博')</title>
    <style>    .navbar{background-color:#FFFFFF;border-bottom: none}
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
        .p-content{
            /*margin-top: 40px;*/
            width:920px;
            height: 1500px;
            /*background-color: #3b3e40;*/
            margin: 0 auto;
        }
        #lis{
            margin-left: 95px;
            cursor: pointer;
        }
        .p-content-left{
            width: 300px;
            height: 600px;
            /*background-color: #4c4f56;*/
            float: left;
        }
        .content-nav{
            margin-top: -10px;
            width:300px;
            height: 60px;
            background-color: #888888;
        }
        .fance{
            float: left;
            margin-left: 30px;
        }
        .attest{
            width: 300px;
            /*height: 400px;*/
            margin-top: 30px;
            background-color: #888888;

        }
        .rank{
            width: 300px;
            height: 50px;
            line-height: 50px;
            border-bottom: #837C7C solid 1px;
        }
        .put-attest{
            height: 50px;
            float: left;
            margin-left: 20px;
        }
        .a-data{
            width: 300px;
            height: 40px;
            line-height: 40px;
            border-bottom: #837C7C solid 1px;
        }
        .a-data-email{
            width: 300px;
            height: 40px;
            line-height: 40px;
            border-bottom: #3B3E40 solid 1px;
        }
        .images{
            width: 300px;;
            height: 350px;
            margin-top: 30px;
            background-color: #888888;
        }
        .images-nav{
            width: 300px;
            height: 40px;
            line-height: 40px;
            border-bottom: #837C7C solid 1px;
        }
        .p-content-right{
            float: left;
            width: 600px;
            height: 1000px;
            margin-left: 20px;
            /*background-color: #4C4F56;*/
        }
        .search-nav{
            width: 600px;
            height: 40px;
            background-color: #888888;
        }
        .search-all{
            float: left;
            width: 80px;
            height: 40px;
            text-align: center;
            line-height: 40px;;
        }
        .search-more{
            float: left;
            width: 80px;
            height: 40px;
            text-align: center;
            line-height: 40px;
        }
        .search-spare{
            float: left;
            width: 440px;
            height: 40px;
            line-height: 36px;
        }
        .search-right{
            margin-left: 164px;
        }
        .content1{
            width: 600px;
            height: 250px;
            background-color: #888888;
            margin-top: 20px;
        }
        .content2{
            width: 600px;
            height: 400px;
            background-color: #888888;
            margin-top: 20px;

        }
        .content3{
            width: 600px;
            height: 300px;
            background-color: #888888;
            margin-top: 20px;

        }
        .mycolor:hover{
            color: #888888;
        }
        .bottom-div{background-color:#FAFAFA;width: 970px;margin:0 auto; margin-top: px}

    </style>
    <link rel="stylesheet" href="/home/css/personal.css">
    <link rel="stylesheet" href="css/iconfont/iconfont.css">
</head>
<body>
    <div id="personal_main">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="img-a"><img src="image/logo.jpg" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right" id="ulul">
                        <li class="lli"><a href="{{url('home/login-index')}}"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                        <li class="lli"><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> 视频</a></li>
                        <li class="lli"><a href="#"><span class="glyphicon glyphicon-zoom-in"></span> 发现</a></li>
                        <li class="lli"><a href="#"><span class="glyphicon glyphicon-globe"></span> 游戏</a></li>
                        <li class="lli"><a href="" class="user">注册</a></li>
                        <li class="lli" style="margin-top: 13px">|</li>
                        <li class="lli"><a href="" class="register">登录</a></li>
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
        <div class="page_center">
            <div class="page_top">
                <div class="page_top_info pull-left">
                    <div class="personal_icon">
                        <img src="{{url('/home/image/icon.jpg')}}" alt="" class="img-circle" width="100px" height="100px">
                    </div>
                    <div class="personal_name">
                        <p><b>我yu世界只差一个妳</b><span class="iconfont">&#xe688;</span></p>
                    </div>
                    <div class="personal_introduce">
                        <p><b>我见过千万人 像你的发 像你的眼 却不像你的脸 任时光匆匆流去我只在乎你</b></p>
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
        <div class="p-content">
            <div class="p-content-left">
                <div class="content-nav">
                    <ul>
                        <li class="fance">
                            <p>195</p>
                            <p>关注</p>
                        </li>
                        <li class="fance">|</li>
                        <li class="fance">
                            <p>256900</p>
                            <p>粉丝</p>
                        </li>
                        <li class="fance">|</li>
                        <li class="fance">
                            <p>128</p>
                            <p>微博</p>
                        </li>
                    </ul>
                </div>
                <div class="attest">
                    <div class="rank">
                        <ul>
                            <li class="put-attest"><b>申请认证</b></li>
                            <li class="put-attest">|</li>
                            <li class="put-attest">14级 <span class="iconfont">&#xe688;</span> </li>
                        </ul>
                    </div>
                    <ul>
                        <li class="a-data"><span class="iconfont">&#xe60d;</span>   安徽芜湖</li>
                        <li class="a-data"><span class="iconfont">&#xe61b;</span>毕业于   芜湖联合大学</li>
                        <li class="a-data"><span class="iconfont">&#xe67c;</span>1995年10月28日</li>
                        <li class="a-data"><span class="iconfont">&#xe5e6;</span>简介:    任时光匆匆流去我只在乎你</li>
                        <li class="a-data-email"><span class="iconfont">&#xe60c;</span>1357119039@qq.com</li>
                        <li class="a-data"><a href="">编辑个人资料</a> <span>></span></li>

                    </ul>
                </div>
                <div class="images">
                    <div class="images-nav"><span class="iconfont">&#xe658;</span><b>相册</b></div>
                </div>
            </div>

            <div class="p-content-right">
                <div class="search-nav">
                    <div class="search-all"><b><a href="">全部</a></b></div>
                    <div class="search-more"><b><a href="">更多</a></b></div>
                    <div class="search-spare">
                        <div class="search">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="exampleInputName2"></label>
                                    <input type="search" class="form-control search-right" id="exampleInputName2" placeholder="输入搜索内容">
                                </div>
                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content1"></div>
                <div class="content2"></div>
                <div class="content3"></div>
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
