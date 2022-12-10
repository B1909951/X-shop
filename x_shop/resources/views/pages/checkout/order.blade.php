@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fuild">
        <h2 class="title text-center" style="padding-top:10px; text-align:center ">Đơn hàng đã được gửi đi</h2>
        <div class="register-req"  style=" text-align:center ">
            <p>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ cho bạn sớm nhất!</p>
            <a href="{{URL::to('/')}}">Nhấn vào đây để quay lại trang chủ</a>
        </div><!--/register-req-->
    </div>
    
</section> <!--/#cart_items-->

@endsection