@extends('home/personalCenter');
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
</style>
@section('content');
<div class="personal-images">
    <div class="personal-images-nav">
        <ul>
            <li class="zhaopian">照片墙</li>
        </ul>
        <ul>
            <form action="{{url('home/upphoto')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="wrap" style="margin-left: 680px">
                    <span>本地照片</span>
                    <input id="fileupload" name="pic" class="file" type="file" />
                    {{--@foreach($result as $rel)--}}
                    {{--<input type="hidden" name="id" value="{{$rel->id}}">--}}
                    {{--@endforeach--}}
                </div>
                <div class="wrap">
                    <span>保存</span>
                    <input type="submit" class="file" id="fileupload">
                </div>
            </form>
        </ul>
    </div>


{{--    @foreach($result as $rel)--}}
        <div class="poto">
{{--            <p style="margin-left: 10px;margin-top: 10px">{{($rel->created_at)}}</p>--}}
            {{--<img  class="abc" src="{{url($rel->pic)}}" alt="">--}}
        </div>
    {{--@endforeach--}}

</div>
@endsection