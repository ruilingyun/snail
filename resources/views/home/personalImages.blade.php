@extends('home/personalCenter')
<style>
    .personal-images{
        width: 920px;
        height: 1000px;
        margin: 0 auto;
        background-color: #FFFFFF;
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
    }
    .upload:hover{
        color: #626262;
    }
    .poto{margin: 15px;float: left;}
    .abc{width: 150px;height: 150px;cursor: pointer;position: absolute}
    .wrap span{
        color:#808080;
    }
    /*隐藏登录窗口*/
    #slogin{width: 800px;height: 450px;display:none;position: fixed;left: 265px;top: 100px;border-top: 2px solid #FA7F40; background-color: #FFFFFF;box-shadow: 0px 2px 3px rgba(34, 25, 25, 0.5);}
    #slogin1{width: 800px;height: 450px;display:none;position: fixed;left: 265px;top: 100px;border-top: 2px solid #FA7F40; background-color: #FFFFFF;box-shadow: 0px 2px 3px rgba(34, 25, 25, 0.5);}
    .login-main1{width: 400px;margin: auto;}
    .login-top{width: 200px;height: 33px;float: left;text-align: center;line-height: 33px;margin-top: 30px;margin-bottom: 30px;font-size: 18px}
    .form-n input{width:200px;height: 34px;margin-top: 10px}
    .lo-a{background-color: #FFFFFF;width: 200px;height: 34px;margin-left: 10px;margin-top: 20px;text-align: center;line-height: 34px}
    .d-submit{width: 200px;height: 34px;background-color: #F7671D;color: white;border: none;margin-left: 10px;margin-top: 10px}
    .log-q{width: 200px;margin: auto;margin-top: 20px}
    .log-q a{margin-left: 25px}
    #tuichu{margin-left: 774px;margin-top: 15px;font-size: 20px;color: #0c5ea7;cursor: pointer}
    #tuichu1{margin-left: 774px;margin-top: 15px;font-size: 20px;color: #0c5ea7;cursor: pointer}
    #tuichu:hover{color: red}
    #tuichu1:hover{color: red}
    /*end*/
    .wrap{
        margin-top: 20px;
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
    .wrap:hover{background-color: #F3B94F;}
    .wrap .file{position:absolute;top:0;right:0;margin:0;border:solid transparent; opacity:0;  filter:alpha(opacity=0);  cursor: pointer;  }
    .xc-xc{width: 1000px;height: 100px;
        margin-top: 20px}
    .xc-fm{width: 100px;height: 100px;float: left;margin-left: 20px;}
    .xc-fm1{width: 100px;height: 100px;}
    .xc-name{width: 150px;font: 16px 楷体;height: 100px;float: left;line-height: 100px;margin-left: 30px;text-align: center}
    .xc-ms{width: 250px;font: 16px 楷体;height: 100px;float: left;line-height: 100px;margin-left: 30px;text-align: center}
    .xc-time{width: 100px;font: 16px 楷体;height: 100px;float: left;line-height: 100px;margin-left: 30px;text-align: center}

</style>
@section('content');
    <div class="personal-images">
        <div class="personal-images-nav">
            <ul>
                <li class="zhaopian">相册专辑</li>
                <li class="zhaopian">照片墙</li>
            </ul>
            <div class="wrap" style="margin-left: 685px" id="login">
                <span>添加相册</span>
            </div>
        </div>
        @foreach($result as $rel)
            <div class="poto">
                <div class="xc-xc">
                    <a href="{{url('home/photoList'.'/'.$rel->id)}}"><span class="xc-fm"><img class="xc-fm1" src="{{url($rel->face)}}" alt=""></span></a>
                    <span class="xc-name">{{$rel->name}}</span>
                    <span class="xc-ms">{{$rel->desc}}</span>
                    <span class="xc-time">{{$rel->time}}</span>
                    <a href="{{url('home/delPhotos'.'/'.$rel->id)}}"><button type="button" class="btn btn-warning" style="margin-top: 35px;margin-left: 50px">删除</button></a>
                    <button type="button" class="btn btn-info" style="margin-top: 35px" id="login1">编辑</button>
                </div>
            </div>
            @endforeach
    </div>
{{--隐藏添加窗口--}}
<div id="slogin">

        <span href="" id="tuichu">X</span>

        <form action="{{url('/home/photos')}}" method="post" style="width: 230px;height: 350px;margin: auto;" enctype="multipart/form-data">
            {{csrf_field()}}
            <ul>
                    <div class="wrap">
                        <span>添加照片</span>
                        <input id="fileupload" name="face" class="file" type="file" />
                    </div>
                    <input type="text" name="name" placeholder="相册名称" style="margin-top: 10px">
                    <textarea name="desc" id="" cols="29" rows="10" placeholder="添加描述" style="margin-top: 10px"></textarea>
                    <p style="margin-right: 30px"><input type="radio" name="display" value="1" >设为封面  <input type="radio" name="display" value="2">不设为封面
                    </p>
                    <div class="wrap" style="float:left;margin-top: 20px">
                        <span>保存</span>
                        <input type="submit" class="file" id="fileupload">
                    </div>
            </ul>
        </form>
</div>
{{--隐藏编辑窗口--}}
<div id="slogin1">

    <span href="" id="tuichu1">X</span>
@if($result->isEmpty())
    @else
    <form action="{{url('/home/upphotos'.'/'.$rel->id)}}" method="post" style="width: 230px;height: 350px;margin: auto;" enctype="multipart/form-data">
        @endif
        {{csrf_field()}}
        <ul>
            <div class="wrap">
                <span>添加照片</span>
                <input id="fileupload" name="face" class="file" type="file" />
            </div>
            <input type="text" name="name" placeholder="请填写新的相册名"  style="margin-top: 10px">
            <textarea name="desc" id="" cols="29" rows="10" placeholder="请填写新的描述" style="margin-top: 10px"></textarea>
            <p style="margin-right: 30px"><input type="radio" name="display" value="1" >设为封面  <input type="radio" name="display" value="2">不设为封面
            </p>
            <div class="wrap" style="float:left;margin-top: 20px">
                <span>保存</span>
                <input type="submit" class="file" id="fileupload">
            </div>
        </ul>
    </form>
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
<script>
    $(function(){
        $('#login1').click(function(){
            $('#slogin1').css('display','block');
        })
        $('#tuichu1').click(function(){
            $('#slogin1').css('display','none');
        })
    })
</script>

@endsection