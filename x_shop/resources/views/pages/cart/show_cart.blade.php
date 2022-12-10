@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fluid">
        <h2 class="title text-center" style="padding-top:10px ">Giỏ hàng</h2>
        <?php 
        $message = Session::get('message');
        if($message){
            echo '<div style="color:red; text-align: center; width: 100%; font-weight:bold">'. $message .'</div>' ;
            Session::put('message',null);
        }
        ?>
        <div class="table-responsive cart_info">
            <?php 
            $content = Cart::content();
         
            ?>
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
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-qty')}}" method="POST">
                                    {{ csrf_field()}}
                                    <?php
                                        if($v_content->qty>$v_content->weight){
                                            ?>
                                            <input class="cart_quantity_input" type="number" min="0" max="{{$v_content->weight}}" name="cart_qty" value="{{$v_content->weight}}"  size="4" style="width:30%">
                                    <?php
                                        }else{
                                            ?>
                                            <input class="cart_quantity_input" type="number" min="0" max="{{$v_content->weight}}" name="cart_qty" value="{{$v_content->qty}}"  size="4" style="width:30%">
                                    <?php
                                        }
                                            ?>  
                                    <input type="hidden" name="rowId_cart" id="" value="{{$v_content->rowId}}" class="form-control">
                                    <input type="submit" name="update_qty" id="" value="Cập nhật" class="btn btn-default btn-sm ">
                                </form>
                            </div>
                            
                        </td>

                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php 
                                    $total_item = $v_content->price * $v_content->qty;
                                    echo '$'.number_format($total_item, 2, '.',',');
                                ?>    
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container-fuild">
        <div class="heading" style="text-align: center">
            <h3>Tổng giỏ hàng</h3>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Số tiền: <span>${{Cart::subtotal()}}</span></li>
                        <li>Thuế: <span>${{Cart::tax()}}</span></li>
                        <li>Phí vận chuyển: <span>$0.00</span></li>
                        <li>Tổng cộng: <span>${{Cart::total()}}</span></li>
                    </ul>
                
                    <div  style="text-align: center">
                    <?php 
                        $customer_id = Session::get('customer_id');
						$shipping_id = Session::get('shipping_id');
                        if($customer_id!=NULL && $shipping_id==NULL ){

                    ?>
                            <a class="btn btn-default check_out" href="{{URL::to('/show-checkout/'.$customer_id)}}">Thanh toán</a>
                        
                    <?php
                       }elseif($customer_id!=NULL && $shipping_id!=NULL ){
                    ?>
                            <a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Thanh toán</a>
                    <?php
                        }else{
                    ?>
                            <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                    <?php
                        }
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection
