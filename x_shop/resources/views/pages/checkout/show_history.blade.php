@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fluid">
        <h2 class="title text-center" style="padding-top:10px ">Lịch sử mua hàng</h2>

        <div class="table-responsive cart_info">
            <?php 
            $content = Cart::content();
            
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Mã giỏ hàng</td>
                        <td class="description">Tổng tiền</td>
                        <td class="price">Tình trạng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                     @foreach($history_order as $h_order)
                    <tr>
                        <td class="">
                            {{$h_order->order_id}}
                        </td>
                        <td class="">
                            {{'$'.number_format($h_order->order_total, 2, '.',',')}}
                        </td>
                        <td class="cart_price">
                            {{$h_order->order_status}}
                        </td>
                        <td class="cart_total">
                            
                            <a href="{{URL::to('/view-history-order/'.$h_order->order_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                                <i class="fa fa-eye" style="color:#fc4f13"></i></i></a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
