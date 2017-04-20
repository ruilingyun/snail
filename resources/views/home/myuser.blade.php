@extends('home/personalCenter')

<style>
    .fis-main{width: 930px;margin: 20px auto;height: 500px;
        }
    .fis-left{width: 300px;float: left;height: 500px;  background-color: #FFFFFF;}
    .fis-left p{width: 300px;float: left;margin-top: 20px; height: 40px;text-align: center;line-height: 40px}
    .fis-left p:hover{background-color: #cccccc;color: darkorange}
    .fis-right{width: 600px;float: right;background-color: #FFFFFF;}
</style>
@section('content')
    <div class="fis-main">
        <div class="fis-left">
            <a href=""><p><span class="iconfont">&#xe666;</span>关注 100</p></a>
            <a href=""><p><span class="iconfont">&#xe51c;</span>粉丝 200</p></a>
            <a href=""><p><span class="iconfont">&#xe633;</span>黑名单 </p></a>
        </div>
        <div class="fis-right">
            @yield('ooo')
        </div>
    </div>
@endsection
