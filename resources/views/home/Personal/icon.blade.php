@extends('layouts.home.accountSet')
@section('title','头像设置 微博-随时随地发现新鲜事')
<style>
    #l2{background-color: #fff;}
    #l2 span{color: #E64141}
    .wrap{
        position:relative;
        overflow:hidden;
        margin-right:4px;
        display:inline-block;
        padding:4px 10px;
        line-height:18px;
        text-align:center;
        vertical-align:middle;
        cursor:pointer;
        background:#F2F2F2;
        border:1px dotted #D8450B;
        border-radius:4px;
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
    }
    .wrap span{
        color:#808080;
    }
    .wrap:hover{background-color: #F3B94F;}
    .wrap .file{position:absolute;top:0;right:0;margin:0;border:solid transparent; opacity:0;  filter:alpha(opacity=0);  cursor: pointer;  }
    .qwe{width: 788px;height: 40px;line-height: 40px; border-bottom: 2px solid red;}
    .qwe span{margin-left: 20px}
    .qwe a{margin-left: 640px}
    .wqe{height: 200px}
    .wqe form{margin-left: 200px;margin-top: 50px}
</style>
@section('content')
    <div class="main-right">
        <div class="qwe"><span>头像</span><a href="">无法上传头像?</a></div>
        <div class="wqe">
            <form action="icon-update/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <table>
                    <div style="width: 100px;height: 100px;margin-left: 100px;margin-top: 100px;margin-left: 19px;margin-top: 47px; margin-bottom: 50px;">
                        <img src="{{url(Auth::user()->avatar)}}" width="100px" alt="">
                    </div>
                            <div class="wrap">
                                <span>本地照片</span>
                                <input id="fileupload" name="avatar" class="file" type="file" />
                            </div>
                            <div class="wrap">
                                <span>保存</span>
                            <input type="submit" class="file" id="fileupload">
                            </div>
                </table>

            </form>
        </div>
        <div><span style="margin-left: 200px">仅支持JPG PNG格式,文件小于5M.(使用高质量图片,可生成高清头像)</span></div>
    </div>
@endsection