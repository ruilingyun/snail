@extends('home/myuser')
<style>
    .y-img{width: 100px;border-radius: 150%}
</style>
<style>

</style>
@section('ooo')
<div>
    <p style="height: 20px;line-height: 20px;border-bottom: 1px solid #8c8c8c"> 粉丝 200</p>
    <div>
        <span style="float: left">
            <img src="{{url('home/image/default.jpg')}}" alt="" class="y-img">
        </span>
        <span style="float: left;margin-left: 30px">
            <p>xxxxxd</p>
            <p>关注:  <a href="" style="color: coral">100</a> | 粉丝: <a href="" style="color: coral">200</a> | 微博: <a href="" style="color: coral">30</a></p>
            <p>简介:</p>
        </span>
    </div>
</div>
@endsection