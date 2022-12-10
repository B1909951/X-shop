@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fuild">
        <h2 class="title text-center" style="padding-top:10px; text-align:center ">Thanh toán giỏ hàng</h2>
        <?php 
        $content = Cart::content();
        
        ?>
        <div class="register-req"  style=" text-align:center ">
            <p>Đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lịch sử mua hàng</p>
        </div><!--/register-req-->
        <div class="review-payment" style=" text-align:center ">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href="{{URL::to('chi-tiet-san-pham/'.$v_content->id)}}"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{URL::to('chi-tiet-san-pham/'.$v_content->id)}}">{{$v_content->name}}</a></h4>
                            <p>Mã sản phẩm: {{$v_content->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{'$'.number_format($v_content->price, 2, '.',',')}}</p>
                        </td>
                        <td class="cart_quantity">
                          
                        <p>{{$v_content->qty}}</p>  
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php 
                                    $total_item = $v_content->price * $v_content->qty;
                                    echo '$'.number_format($total_item, 2, '.',',');
                                ?>    
                            </p>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-12"  style="width:100%; margin-bottom:20px">
            <div class="total_area">
                <ul>
                    <li>Số tiền: <span>${{Cart::subtotal()}}</span></li>
                    <li>Thuế: <span>${{Cart::tax()}}</span></li>
                    <li>Phí vận chuyển: <span>$0.00</span></li>
                    <li>Tổng cộng: <span>${{Cart::total()}}</span></li>
                </ul>
            </div>
        </div>
        <div class="review-payment" style=" text-align:center;">
            <h2>Chọn hình thức thanh toán</h2>
        </div>
        <form action="{{URL::to('/order-place')}}" method="POST" style=" text-align:center ">
            {{csrf_field()}}
       
            <div class="payment-options" style="margin-top:30px">
                <span>
                    <label><input name="payment_option" value="1" type="radio"  checked>Trả tiền khi nhận hàng</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="radio">Trả tiền thông qua thẻ ATM</label>
                 </span>
                <span>
                    <label><input name="payment_option" value="3" type="radio">Trả thông qua Momo</label>
                </span>
                <div><button onclick="datHang()" type="submit" class="btn btn-fefault cart" style="width:150px; margin-top:15px ">
                    <i class="fa fa-shopping-cart"></i>
                    <a href=""></a>
                    Đặt hàng
                </button></div>
            
            </div>
        </form> 
        
        
    </div>
    <script>
        function datHang() {
            if (confirm("Xác nhận đặt hàng?")) {
                
            } else {
                event.preventDefault()
        }
             
        }
        </script>
</section> <!--/#cart_items-->

@endsection