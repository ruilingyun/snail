@extends('home/personalCenter');
<style>
    .personal-images{
        width: 920px;
        height: 1000px;
        margin: 0 auto;
        background-color: #888888;
    }
    .personal-images-nav{
        width: 920px;
        height: 40px;
    }
    .zhaopian{
        float: left;
        margin-left: 15px;
        line-height: 40px;
        cursor: pointer;
    }
    .zhaopian:hover{
        color: #626262;
    }
    .upload{
        float: right;
        line-height: 40px;
        margin-right: 15px;
        cursor: pointer;
    }
    .upload:hover{
        color: #626262;
    }
</style>
@section('content');
    <div class="personal-images">
        <div class="personal-images-nav">
            <ul>
                <li class="zhaopian">照片墙</li>
                <li class="zhaopian">|</li>
                <li class="zhaopian">视频</li>
                <li class="zhaopian">|</li>
                <li class="zhaopian">我赞过的</li>
                <li class="zhaopian">|</li>
                <li class="zhaopian">相册专辑</li>
            </ul>
            <ul>
                <li class="upload"><span class="iconfont">&#xe658;</span>上传照片</li>
                <li class="upload"><span class="iconfont">&#xe613;</span>上传视频</li>
            </ul>
        </div>
    </div>
@endsection