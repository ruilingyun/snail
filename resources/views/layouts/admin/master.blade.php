<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>@yield('title', '后台管理系统')</title>
    <style>
        #navlist ul ul {
            display: none;

        }
        #navlist ul ul li{
            cursor:pointer;

            background-color: #035D1A;
            height: 80px;;

        }

        .font_size{
            color: #ededee;
        }
        h4{
            cursor:pointer;
            line-height: 49px;
        }
    </style>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{url('admin/css/style.css')}}" media="all" />
    <link rel="stylesheet" href="{{url('admin/css/bootstrap.css')}}">
    <script src='/admin/js/jquery-1.8.3.min.js'></script>

    <!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
    <!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->
    <link rel="stylesheet" href="{{url('admin/css/iconfont/iconfont.css')}}">



</head>
<body>
<div class="testing">
    {{--<header class="main">--}}
    {{--<h1>欢迎<strong> user </strong>来到后台管理系统</h1>--}}
    {{--</header>--}}
    <section class="user">
        <div class="profile-img">

            <p><img src="{{url('/home/image/icon.jpg')}}" alt="" class="img-circle" width="50px" height="50px">     Welcome back 我yu世界只差一个妳</p>

        </div>
        <div class="buttons">
            <button class="ico-font">&#9206;</button>
            <span class="button dropdown">
			<a href="#">未读消息 <span class="pip">4</span></a>
		</span>
            <span class="button dropdown">
			<a href="#">留言 <span class="pip">3</span></a>
		</span>
            <span class="button">提示</span>
            <span class="button">帮助</span>
            <span class="button blue"><a href="index.html">注销</a></span>
        </div>
    </section>
</div>

<nav id="navlist">
    <ul>
        <li><a href="{{url('admin/index')}}"><span class="iconfont">&#xe60d;</span>后台首页</a></li>
        <li><h4 class="font_size"><span class="iconfont">&#xe65c;</span>权限管理</h4></li>
        <ul>
            <li><a href="{{url('admin/permission-list')}}"><span class="iconfont">&#xe65c;</span>权限管理</a></li>
            <li><a href="{{url('admin/role-list')}}"><span class="iconfont">&#xe721;</span>角色管理</a></li>
            <li><a href="{{url('admin/user-list')}}"><span class="iconfont">&#xe602;</span>管理员管理</a></li>
        </ul>
        <li><h4 class="font_size"><span class="iconfont">&#xe6d3;</span>用户管理</h4></li>
        <ul>
            <li><a href="image"><span class="iconfont">&#xe667;</span> 个人用户 <span class="pip">23</span></a></li>
            <li><a href="comment"><span class="iconfont">&#xe6d3;</span> 企业用户 <span class="pip">12</span></a></li>
            <li><a href="status"><span class="iconfont">&#xe665;</span> 用户状态 </a></li>
        </ul>
        <li><h4 class="font_size"><span class="iconfont">&#xe66c;</span>文章管理</h4></li>

        <ul>
            <li><a href=""><span class="iconfont"></span>添加文章</a></li>
            <li><a href=""><span class="iconfont"></span>修改文章</a></li>

            <li><a href=""><span class="iconfont"></span>删除文章</a></li>
        </ul>
        <li><h4 class="font_size"><span class="iconfont">&#xe614;</span>新闻管理</h4></li>
        <ul>

            <li><a href=""><span class="iconfont"></span>添加新闻</a></li>

            <li><a href=""><span class="iconfont"></span>删除新闻</a></li>
            <li><a href=""><span class="iconfont"></span>修改新闻</a></li>
        </ul>
        <li><h4 class="font_size"><span class="iconfont">&#xe624;</span>广告管理</h4></li>
        <ul>

            <li><a href=""><span class="iconfont"></span>添加广告</a></li>

            <li><a href=""><span class="iconfont"></span>修改广告</a></li>
            <li><a href=""><span class="iconfont"></span>删除广告</a></li>
        </ul>
        <li><h4 class="font_size"><span class="iconfont">&#xe603;</span>友情链接</h4></li>
        <ul>
            <li><a href="{{url('admin/link-list')}}"><span class="iconfont">&#9881;</span>链接管理</a></li>
        </ul>
    </ul>
</nav>
@yield('content')

{{--<script>--}}
{{--$(function(){--}}
{{--$('#navlist li').mouseenter(function(){--}}
{{--$(this).css('background-color','pink');--}}
{{--}).mouseleave(function(){--}}
{{--$(this).css('background-color','');--}}
{{--})--}}
{{--})--}}
{{--</script>--}}

{{--<script>--}}
{{--$(function(){--}}
{{--$('ul').click(function(){--}}
{{--$(this).next('ul').slideToggle('slow').siblings('ul').slideUp();--}}
{{--})--}}
{{--})--}}
{{--</script>--}}



<script type="text/javascript">
    // Feature slider for graphs
    $('.cycle').cycle({
        fx: "scrollHorz",
        timeout: 0,
        slideResize: 0,
        prev:    '.left-btn',
        next:    '.right-btn'
    });
</script>
{{--<script type="text/javascript">--}}
{{--var lis = document.getElementById('navlist').getElementsByTagName('li');--}}

{{--// 为每一个li绑定鼠标事件--}}
{{--for(var i=0; i<lis.length; i++){--}}
{{--lis[i].onmouseover = function(){--}}
{{--// 判断ul是否存在ul--}}
{{--if (this.getElementsByTagName('ul').length > 0) {--}}
{{--this.getElementsByTagName('ul')[0].style.display = 'block';--}}
{{--};--}}
{{--this.style.backgroundColor ='red';--}}
{{--}--}}
{{--lis[i].onmouseout = function(){--}}
{{--if (this.getElementsByTagName('ul').length > 0) {--}}
{{--this.getElementsByTagName('ul')[0].style.display = 'none';--}}
{{--};--}}
{{--this.style.backgroundColor ='';--}}
{{--}--}}
{{--}--}}
{{--</script>--}}
<script type="text/javascript">
    $(function(){
        $('li').click(function(){
            $(this).next('ul').slideToggle('fast');
        })
    })
</script>
</body>
</html>