@extends('layouts.home.accountSet')
@section('title','屏蔽设置 微博-随时随地发现新鲜事')
<script src='{{url('home/js/jquery-1.8.3.min.js')}}'></script>

<style>
    #l5{background-color: #fff;}
    #l5 span{color: #E64141}
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
        <div class="right-1"><span class="span-0">屏蔽设置</span></div>
        <p class="right-2"><span class="span-0">屏蔽用户</span><span class="span-1">&nbsp;&nbsp; 将用户添加至屏蔽列表,并设置屏蔽范围</span><a href="">编辑</a></p>
        <p class="right-2"><span class="span-0">屏蔽关键词</span><span class="span-1">将关键词添加到屏蔽列表,并设置屏蔽范围</span><a href="">编辑</a></p>
        <p class="right-2"><span class="span-0">屏蔽微博</span><span class="span-1">&nbsp;&nbsp; 被屏蔽的微博可以在这里找到</span><a href="">编辑</a></p>
    </div>

@endsection
