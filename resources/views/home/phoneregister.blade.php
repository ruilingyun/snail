<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <link rel="shortcut icon"type="image/x-icon" href="image/favicon.ico"media="screen" />
    <title>微博注册</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
        body{
            background-image: url('/home/image/register.jpg');
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        #register{
            position: relative;
            margin: 0 auto;
        }
        #register .logo{
            margin-top: 20px;
            margin-left: 540px;
        }
        .register-main{
            width: 700px;
            height: 500px;
            position: absolute;
            margin-top: 40px;
            margin-left: 300px;
            background-color: #DEF6FA;
        }
        .register-main .top{
            width: 100%;
            height: 82px;
            padding:20px;
        }
        .register-main .top h2{
            text-align: center;
        }
        .register-main .bottom{
            padding: 20px;
        }
        .zhuce{
            margin: 0 auto;
        }
        .register-main .bottom .input{
            margin-top: 10px;
            text-align: center;
        }
        .button .alert{
            width: 500px;
        }
    </style>
</head>
<body>
<div id="register">
    <div class="logo">
        <img src="{{url('/home/image/logo.png')}}" alt="" width="200px" height="50px">
    </div>
    <div class="register-main">
        <div class="top">
            <h2><b>手机注册</b></h2>
        </div>
        <div class="bottom">
            <form class="form-inline" action="{{url('/home/store')}}" method="post">
                {{csrf_field()}}
                @if(count($errors)> 0)
                    <div class="alert alert-danger input" style="width: 264px;margin-top: -25px;margin-left: 198px">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input">
                    <label for="exampleInputName2">用 &nbsp;户 &nbsp;名:</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="请输入用户名">
                </div>
                <div class="input">
                    <label for="exampleInputName2">手 &nbsp;机 &nbsp;号:</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputName2" placeholder="请输入手机号">
                </div>
                <div class="input">
                    <label for="exampleInputEmail2">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                </div>
                <div class="input">
                    <label for="exampleInputEmail2">确认密码:</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请确认密码">
                </div>
                <div class="input">
                    <div style="float: left; margin-left: 280px;">
                    <label for="exampleInputName2" style="margin-left: -95px;">验 &nbsp;证 &nbsp;码:</label>
                    <input type="text" name="code" placeholder="请输入验证码" style="width: 100px; height: 34px;"></div>
                    <div style="float: left; width: 80px; height: 34px; line-height: 34px; border: 1px solid #A9A9A9; background-color: #FFFFFF;"><a href="">发送验证码</a></div>
                </div>
                <div class="input">
                    <input type="submit" class="btn btn-default zhuce" value="注册" style="background-color:#FFA00A;color: #FFFFFF; margin: 0 auto;width: 263px;margin-top: 20px;margin-bottom: 20px;">
                </div>
            </form>
            <p style="margin-left: 405px;"><a href="{{url('home/register')}}">邮箱注册</a></p>
            <p style="margin-left: 347px;"><a href="index#">已有账号,直接登录</a></p>
        </div>
    </div>
</div>
</body>
</html>