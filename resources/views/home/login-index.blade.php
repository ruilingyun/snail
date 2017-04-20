@extends('layouts/home/masterL')
@section('title','我的首页 微博-随时随地发现新鲜事')
<style>
    .right-all{
        width: 200px;
        /*background-color: #888888;*/
        /*margin-left: 20px;*/
        float: left;
    }
    .right-nav{
        width: 200px;
        height: 200px;
        background-color: #FFFFFF;
    }
    .fancer{
        float: left;
        list-style: none;
        margin-left: 4px;
    }
    p{
        text-align: center;
    }
    .ad1{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .ad2{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .ad3{
        width: 200px;
        height: 250px;
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .publish{
        width: 600px;
        background-color: #FFFFFF;
    }
    .f_nav{
        width: 600px;
        height: 35px;
    }
    .img-big{margin-top: 20px}
    li{
        list-style: none;
    }
    .f-left{
        float: left;
        line-height: 35px;
        color: #1A7FB5;
        margin-top: 10px;
        font: 16px 楷体;
    }
    .f-right{
        float: right;
        line-height: 35px;
        color: #EB7350;
        font: 16px 楷体;
        margin-top: 10px;
        margin-right: 20px;
    }
    .input-nav{
        /*margin-top: 20px;*/
        width: 600px;
        height: 74px;
        /*border: #3b3b3b solid 1px;*/
    }
    .assortment-nav{
        width: 600px;
        height: 35px;
    }
    .assortment{
        float: left;
        margin-left: 10px;
        color: black;
    }
    .abc{
        color: black;
    }
    .btn{
        float: right;
        margin-right: 20px;
    }
    .input-shu{
        width: 560px;
        height: 74px;
        margin-left: 20px;
        background-color: #FFFFFF;
        border: black solid 1px;
    }
    .assortment-all{
        width: 600px;
        height: 40px;
        background-color: #FFFFFF;
    }
    .assortment-all1{
        float: left;
        margin-left: 15px;
        line-height: 40px;
    }
    .form-inline{
        float: right;
    }
    .content-all{
        width: 600px;
        /*height: 800px;*/
        margin-top: 20px;
        background-color: #FFFFFF;
    }
    .content-list{
        width: 598px;
        /*height: 250px;*/
        margin: 0 auto;
        background-color: #fff;
    }
    .list-top{
        width: 598px;
        height: 60px;
    }
    .list-top .list-useravatar{
        width: 60px;
        height: 60px;
        padding: 5px
    }
    .list-name{
        height: 60px;
        padding: 3px;
        line-height: 60px;
        font-size: 20px;
    }
    .list-top .list-delete{
        width: 40px;
        height: 60px;
        line-height: 60px;
        font-size: 20px;
        margin-right: 10px;
    }
    .list-middle{
        width: 598px;
        padding:10px;
        font-size: 15px;
        border: 1px solid black;
    }
    .list-bottom{
        /*height: 40px;*/
        /*margin-top: 10px;*/
        /*border-top: 1px solid black;*/
    }
    .list-bottom li{
        width: 130px;
        /*height: 40px;*/
        text-align: center;
        font-size: 15px;
        line-height: 40px;
    }
    .list-comment{
        width: 598px;
        /*height: 70px;*/
        background-color: #ccc;
        margin-top: 0px;
        margin-left: -40px;
        display: none;
    }
    .list-comment .comment-top{
        width: 598px;
        height: 50px;
    }
    .comment-avatar{
        width: 30px;
        height: 30px;
        margin-top: 10px;
        margin-left: 10px;
    }
    .comment-input{
        margin-left: 5px;
        margin-top: 10px;
        width: 520px;
        height: 30px;
    }
    .comment-input textarea{
        width: 500px;
        height: 30px;
        line-height: 25px;
        /*padding: 3px;*/
    }
    .btn-comment{
        width: 60px;
        height: 30px;
        line-height: 25px;
        margin: 0px 10px 2px 520px;
        background-color: orange;
        padding: 0;
    }
    .comment-middle{
        width: 598px;
    }
    .comment-middle-list{
        width: 598px;
        height: 50px;
    }
    .comment-middle-list .comment-middle-list-avatar{
        margin-top: 10px;
        width: 30px;
        height: 30px;
        margin-left: 10px;
    }
    .comment-middle-list-ncd{
        padding: 5px;
        margin-left: 5px;
        width: 530px;
        height: 50px;
    }
    .comment-middle-list-nc{
        width: 530px;
        height: 25px;
        line-height: 25px;
    }
    .comment-middle-list-del{
        width: 530px;
        height: 15px;
        font-size: 10px;
        line-height:15px;
    }
    .comment-middle-list-del a{
        margin-left: 500px;
    }


</style>

@section('content')
    <div class="publish">
        <div class="f_nav">
            <ul>
                <li class="f-left">有什么新鲜事想告诉大家?</li>
                <li class="f-right">可发300字微博</li>
            </ul>
        </div>
        <form action="{{url('home/login-index')}}" method="post">
            {{csrf_field()}}
            <div class="input-nav">
                <textarea class="input-shu input" name="content" rows="3" id="text"></textarea>
            </div>
            <div class="assortment-nav">
                <ul>
                    <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe502;</span>表情</a></li>
                    <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe658;</span>图片</a></li>
                    <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe613;</span>视频</a></li>
                    <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe618;</span>话题</a></li>
                    <li class="assortment"><a href="" class="abc"><span class="iconfont">&#xe67c;</span>头条文章</a></li>
                </ul>
                <input type="submit" class="btn btn-info" id="ipt" value="发布">
            </div>
        </form>
    </div>
    <div class="assortment-all">
        <ul>
            <li class="assortment-all1"><a href="" class="abc">全部</a></li>
            <li class="assortment-all1"><a href="" class="abc">原创</a></li>
            <li class="assortment-all1"><a href="" class="abc">图片</a></li>
            <li class="assortment-all1"><a href="" class="abc">视频</a></li>
            <li class="assortment-all1"><a href="" class="abc">音乐</a></li>
            <li class="assortment-all1"><a href="" class="abc">文章</a></li>
        </ul>
        <form class="form-inline">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="输入搜索内容">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    @foreach($msg as $v)
        <div class="content-all" id="txt">
            <div class="content-list">
                <div class="list-top clearfix">
                    <div class="list-useravatar pull-left">
                        <img src="{{url(Auth::user()->avatar)}}" width="50px" height="50px" class="img-circle">
                    </div>
                    <div class="list-name pull-left">
                        <span>{{Auth::user()->name}}</span>
                    </div>
                    <div class="list-delete pull-right">
                        <a href="{{url('home/delMsg'.'/'.$v->id)}}">删除</a>
                    </div>
                </div>
                <div class="list-middle">
                    <span>{{$v->content}}</span>
                </div>
                <div class="list-bottom">
                    <ul class="clearfix">
                        <li class="pull-left"><span class="glyphicon glyphicon-heart-empty"></span>收藏</li>
                        <li class="pull-left"><span class="glyphicon glyphicon-share"></span>1120</li>
                        <li class="pull-left"><span class="glyphicon glyphicon-thumbs-up"></span>11001</li>
                        <li class="pull-left cmt">
                            <span class="glyphicon glyphicon-edit"></span>4210
                        </li>
                        <div class="list-comment">
                            <form action="{{url('home/comment')}}" method="post">
                                {{csrf_field()}}
                                <div class="comment-top clearfix">
                                    <div class="comment-avatar pull-left">
                                        <img src="{{url(Auth::user()->avatar)}}" width="30px" height="30px" class="img-rounded">
                                    </div>
                                    <div class="comment-input pull-left">
                                        <textarea class="comment-info" name="commit_content" rows="1" id="comment" resize="no"></textarea>
                                    </div>
                                </div>
                                <div class="comment-middle">
                                    <input type="hidden" value="{{date('Y-m-d H:i:s',time())}}" name="commit_time">
                                    <input type="hidden" value="{{$v->id}}" name="say_id">
                                    <input class="btn-comment" type="submit" value="评论">
                                </div>
                            </form>
                            @foreach($comment as $value)
                                @if($value->say_id==$v->id)
                                    <div class="comment-middle-list clearfix">
                                        <div class="comment-middle-list-avatar pull-left">
                                            <img src="{{url(Auth::user()->avatar)}}" width="30px" height="30px" class="img-rounded">
                                        </div>
                                        <div class="comment-middle-list-ncd pull-left">
                                            <div class="comment-middle-list-nc clearfix">
                                                <div class="comment-middle-list-username pull-left">{{Auth::user()->name}}</div>
                                                <div class="comment-middle-list-comment pull-left">: {{$value->commit_content}}</div>
                                            </div>
                                            <div class="comment-middle-list-del">
                                                <a href="{{url('home/delCom'.'/'.$value->id)}}">删除</a>
                                            </div>

                                        </div>

                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('right')
    <div class="right-all">
        <div class="right-nav">
            <p><a href="personalCenter"><img src="{{url(Auth::user()->avatar)}}" alt="" class="img-circle img-big" width="60px" height="60px"></a></p>
            <p>{{Auth::user()->name}} <span class="iconfont">&#xe688;</span></p>
            <p>
                <ul>
                    <li class="fancer"><p>66</p><p>关注</p></li>
            <li class="fancer">|</li>
            <li class="fancer"><p>1596</p><p>粉丝</p></li>
            <li class="fancer">|</li>
            <li class="fancer"><p>151</p><p>微博</p></li>
            </ul>
            </p>
        </div>
        <div class="ad1"></div>
        <div class="ad2"></div>
        <div class="ad3"></div>
    </div>
    <script>
        var ipt = document.getElementById("ipt");
        var txt = document.getElementById('txt');
        var textarea = document.getElementById("text");
        ipt.onclick = function(){
            var textValue = textarea.value.LTrim();
            textarea.value="";
            if(textValue.length>0 ){
                var divs = document.createElement("div");
                var imgs = document.createElement("img");
                var ps = document.createElement("p");
                var inputs = document.createElement("input");
                divs.setAttribute("class","creatediv");
                imgs.setAttribute('class',"createimg");
                ps.setAttribute("class","createdivs");
                inputs.setAttribute("class","createinput");
                imgs.src="{{url('/home/image/2.jpg')}}";
                inputs.type="button";
                inputs.value="删除";
                ps.innerHTML=textValue;
                divs.appendChild(imgs);
                divs.appendChild(ps);
                divs.appendChild(inputs);
                if(txt.children.length==0){
                    txt.appendChild(divs);

                }else{
                    txt.insertBefore(divs,get_firstChild(txt))
                }
                inputs.onclick = function(){
                    this.parentNode.parentNode.removeChild(this.parentNode)
                }
            }
        }
        //        cmt.onclick = function(){
        //            var divs = document.createElement("div");
        //            var inputs = document.createElement("input");
        //        }

    </script>
    <script>
        var ipt = document.getElementById("ipt");
        var txt = document.getElementById('txt');
        var textarea = document.getElementById("text");
        ipt.onclick = function(){
            var textValue = textarea.value.LTrim();
            textarea.value="";
            if(textValue.length>0 ){
                var divs = document.createElement("div");
                var imgs = document.createElement("img");
                var ps = document.createElement("p");
                var inputs = document.createElement("input");
                divs.setAttribute("class","creatediv");
                imgs.setAttribute('class',"createimg");
                ps.setAttribute("class","createdivs");
                inputs.setAttribute("class","createinput");
                imgs.src="{{url('/home/image/2.jpg')}}";
                inputs.type="button";
                inputs.value="删除";
                ps.innerHTML=textValue;
                divs.appendChild(imgs);
                divs.appendChild(ps);
                divs.appendChild(inputs);
                if(txt.children.length==0){
                    txt.appendChild(divs);

                }else{
                    txt.insertBefore(divs,get_firstChild(txt))
                }
                inputs.onclick = function(){
                    this.parentNode.parentNode.removeChild(this.parentNode)
                }
            }
        }

        $(function(){
            $('.cmt').click(function(){
                $(this).next('div').slideToggle('slow',function () {

                });
            })
        })


    </script>
@endsection