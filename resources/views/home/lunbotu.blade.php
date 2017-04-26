<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('home/css/bootstrap.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]> -->
<!--    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .container-fluid{
            width:80%;
        }
        .carousel .item{
            height:300px;
            background-color:#000;
        }
        .carousel .item p{
            font-size:20px;
            margin-bottom:50px;
        }
        .img_container{
            margin-top:100px;
            margin-bottom:100px;
        }
        .col-md-4{
            text-align: center;
        }
        .nav-tabs{
            margin-top:50px;
        }
        .container{
            width: 230px;
            height: 300px;
            overflow: hidden;
            padding-left: 0px;
        }

    </style>
</head>
<body>
<div class="container">
    <!-- 轮播图开始 -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"  style="width:230px;height:300px;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($advert as $k => $v)
                @if($k == 0)
            <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" class="active"></li>
                @else
            <li data-target="#carousel-example-generic" data-slide-to="{{$k}}"></li>
                @endif
            @endforeach

            {{--<li data-target="#carousel-example-generic" data-slide-to="2"></li>--}}
            {{--<li data-target="#carousel-example-generic" data-slide-to="3"></li>--}}
            {{--<li data-target="#carousel-example-generic" data-slide-to="4"></li>--}}
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox"  style="width:230px;height:300px;">
            {{--@foreach($advert as $value)--}}
            {{--<div class="item active">--}}
                {{--<img src="{{$value->icon}}" alt="...">--}}
            {{--</div>--}}
            {{--@endforeach--}}

            @foreach($advert as $k => $v)
                @if($k == 0)
            <div class="item active">
                <img src="{{url(($v->icon))}}" alt="..." style="width: 230px;height: 300px;">
            </div>
                @else
            <div class="item">
                <img src="{{url($v->icon)}}" alt="..." style="width: 230px;height: 300px;">
            </div>
                @endif
            {{--<div class="item">--}}
                {{--<img src="image/l3.jpg" alt="...">--}}
            {{--</div>--}}

            {{--<div class="item">--}}
                {{--<img src="image/l4.jpg" alt="...">--}}
            {{--</div>--}}

            {{--<div class="item">--}}
                {{--<img src="image/l5.jpg" alt="...">--}}
            {{--</div>--}}
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        </a>
    </div>
    <!-- 轮播图结束 -->
</div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{url('home/js/jquery-2.1.4.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{url('home/js/bootstrap.js')}}"></script>
</body>
</html>