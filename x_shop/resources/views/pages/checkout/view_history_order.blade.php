@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fluid">
        <h2 class="title text-center" style="padding-top:10px ">Danh sách sản phẩm đã mua</h2>

        <div class="table-responsive cart_info">
            <?php 
            $content = Cart::content();
            
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td></td>
                        <td class="image">Sản phẩm</td>
                        <td class="description">Giá</td>
                        <td class="price">Số lượng</td>
                        <td class="price">Tổng tiền</td>
                    </tr>
                </thead>
                <tbody>
                     @foreach($view_history_order as $pro)
                    <tr>
                        <td><a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100px" width="100px"></a></td>
                        <td><a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></td>
                        
                        <td>{{'$'.number_format($pro->product_price, 2, '.',',')}}</td>
                        <td>{{$pro->product_sales_quantity}}</td>
                        <td>{{'$'.number_format($pro->product_price*$pro->product_sales_quantity, 2, '.',',')}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
