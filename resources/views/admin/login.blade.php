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
    <link rel="shortcut icon"type="image/x-icon" href="{{url('admin/image/favicon.ico')}}"media="screen" />


    <title>新浪微博后台登录</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url('image/tim3.jpg');
            background-repeat: no-repeat;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .form-control{
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

<<<<<<< HEAD
    <form class="form-signin" action="{{url('admin/doLogin')}}" method="post">
        {{csrf_field()}}
        <h2 class="form-signin-heading">请登录...</h2>
        @if(count($errors)> 0)
            <div class="alert alert-danger input" style="width: 300px;margin-top: -25px;margin-left: 198px">
=======

    <form class="form-signin" action="{{url('/admin/doLogin')}}" method="post">
        {{csrf_field()}}
        <h2 class="form-signin-heading">请登录...</h2>
        @if(count($errors)> 0)
            <div class="alert alert-danger input" style="width: 264px;margin-top: -25px;margin-left: 198px">
>>>>>>> 1221022da6f5879db6cf48e6083eaf7407927a92
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="inputEmail" class="sr-only">Email address</label>
<<<<<<< HEAD
        <input type="text" name="email" class="form-control" placeholder="请输入用户邮箱"  autofocus>
=======
        <input type="email" name="email" class="form-control" placeholder="请输入用户邮箱"  autofocus>
>>>>>>> 1221022da6f5879db6cf48e6083eaf7407927a92
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="请输入密码" >
        <button class="btn btn-lg btn-success btn-block" type="submit">登录</button>
    </form>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
