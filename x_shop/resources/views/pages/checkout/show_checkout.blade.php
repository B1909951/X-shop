@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fuild">
        <h2 class="title text-center" style="padding-top:10px; text-align:center; ">Thông tin giỏ hàng</h2>
        <?php 
        $content = Cart::content();
        
        ?>
        <div class="register-req" style=" text-align:center; ">
            <p>Đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations" style="text-align: center">
            <div class="row">
                <div class="col-sm-12 " style="text-align: center"> 
                    <div class="bill-to">
                        
                        <div class="form-one" style="width:60%; margin: 15px 20%" >
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{csrf_field()}}
                                <p>Thông tin nhận hàng</p>
                                <input type="text" name="shipping_name" value="{{$customer->customer_name}}" readonly>
                                <input type="text" name="shipping_email" value="{{$customer->customer_email}}" readonly>
                                <input type="text" name="shipping_phone" value="{{$customer->customer_phone}}" readonly> 
                                <?php
                                    $address = Session::get('s_address');
                                    $message = Session::get('s_message');
                                    if($address!=NULL){

                                ?>
                                            <input type="text" name="shipping_address" value="{{$address}}" required>
                                        
                                <?php
                                    }else{
                                ?>
                                        <input type="text" name="shipping_address" value="Không" required>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($message!=NULL){
                                ?>
                                    <div class="order-message">
                                        <p>Ghi chú</p>
                                        <textarea name="shipping_message" rows="16">{{$message}}</textarea>
                                    </div>
                                <?php 
                                    }else{
                                ?>
                                        <div class="order-message">
                                            <p>Ghi chú</p>
                                            <textarea name="shipping_message" rows="16">Không</textarea>
                                        </div>
                                <?php
                                    }
                                ?>
                                <button type="submit" class="btn btn-fefault cart" style="width:200px ">
                                    <i class="fa fa-shopping-cart"></i>
                                    Đi đến thanh toán
                                </button>
                            </form>
                        </div>
                    </div>
                </div>					
            </div>
        </div>
        
    
</section> <!--/#cart_items-->

@endsection
