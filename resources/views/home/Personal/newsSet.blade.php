@extends('layouts.home.accountSet')
@section('title','消息设置 微博-随时随地发现新鲜事')
<script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>

<style>
    #l4{background-color: #fff;}
    #l4 span{color: #E64141}
    .span-1{margin-left: 200px;color: #808080}
    .submit{background-color: #FFA00A;border: none;color: #FFFFFF;margin-left: 40px}
    /*下拉*/
    #navenc ul{display:none;}
    .form-1{
        width: 788px;
        padding: 10px;
        margin-left: -40px;
        border:1px solid #999;
        background-color:#fff;
    }
    /*.form-2 p{text-align: right}*/

</style>
<script>
    $(function(){
        $('#navenc p').click(function(){
            //当前p的下一个ul做下拉切换，其他的ul全部关闭
//            alert(1);
            $(this).next('ul').slideToggle().siblings('ul').slideUp();
        })
    })
</script>
@section('content')
    {{--右边部分--}}
    <div class="main-right" id="navenc">
        <div class="right-1"><span class="span-0">消息设置</span></div>
        <p class="right-2"><span class="span-0">@我的</span><span class="span-1">@我的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我可以收到哪些人的@消息</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人</p>
                <p>我将收到这些人的@小黄签提醒</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人</p>
                <p><input type="radio"> 不提醒</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">评论</span><span class="span-1">&nbsp;&nbsp;&nbsp; 评论的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>允许哪些人评论我</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人</p>
                <p><input type="radio"> 仅粉丝</p>
                <p>是否允许其他人在我的微博评论中发图片</p>
                <p><input type="radio"> 允许</p>
                <p><input type="radio"> 不允许(关闭后,其他人将不能在你的微博下发布带图片的评论)</p>
                <p>我将收到这些人的评论小黄签提醒</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人</p>
                <p><input type="radio"> 不提醒</p>
                <p>我参与的(开启后,若评论了一条微博,我将收到"关注的人"对这条微博评论)</p>
                <p><input type="radio"> 开启</p>
                <p><input type="radio"> 不开启</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">赞</span><span class="span-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 赞的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我是否接受赞提醒</p>
                <p><input type="radio"> 提醒</p>
                <p><input type="radio"> 不提醒</p>
                <p>我参与的(开启后,若赞了一条微博,我将收到"关注的人"对这条微博的赞)</p>
                <p><input type="radio"> 开启</p>
                <p><input type="radio"> 不开启</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">私信</span><span class="span-1">&nbsp;&nbsp;&nbsp; 私信的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我可以接受哪些人的私信</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人(非我关注人的私信请进入未关注人私信查看)</p>
                <p>我是否接受私信提醒</p>
                <p><input type="radio"> 提醒</p>
                <p><input type="radio"> 不提醒</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">未关注人私信</span><span class="span-1" style="margin-left: 157px">未关注人私信的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我是否接受微关注人私信的小黄签提醒</p>
                <p><input type="radio"> 提醒</p>
                <p><input type="radio"> 不提醒</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">新粉丝</span><span class="span-1">新粉丝的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我将收到这些人的新粉丝小黄签提醒</p>
                <p><input type="radio"> 所有人</p>
                <p><input type="radio"> 我关注的人</p>
                <p><input type="radio"> 不提醒</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
        <p class="right-2"><span class="span-0">好友圈</span><span class="span-1">好友圈的相关设置</span><a href="">编辑</a></p>
        {{--下拉内容--}}
        <ul>
            <form action="" class="form-1">
                <p>我是否接受好友圈的小黄签提醒</p>
                <p><input type="radio"> 提醒</p>
                <p><input type="radio"> 不提醒</p>
                <div><input type="submit" class="submit" value="保存"><input type="reset" class="submit" value="重置"></div>
            </form>
        </ul>
    </div>

@endsection
