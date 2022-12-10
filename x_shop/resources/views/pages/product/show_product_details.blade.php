@extends('layout')
@section('content')
@foreach($product as $key => $pro)
<h2 class="title text-center" style="padding-top:10px ">Chi tiết sản phẩm</h2>

<div class="product-details"style="padding-top:10px ">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="{{asset('public/frontend/images/new.jpg')}}" class="newarrival" alt="" />
            <h1>{{$pro->product_name}}</h1>
            <p>Mã sản phẩm: {{$pro->product_id}}</p>
            <img src="{{asset('public/frontend/images/rating.png')}}" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <span>Giá: {{'$'.number_format($pro->product_price, 2, '.',',')}}</span>
                    <div><label>Số Lượng:</label>
                        <input type="number" name="qty" min="1" value="1" max="{{$pro->product_inventory}}"/></div>
                <input name="productid_hidden" type="hidden" value="{{$pro->product_id}}"/>
                <input name="inventory" type="hidden" value="{{$pro->product_inventory}}"/>

                <button type="submit" class="btn btn-fefault cart" style="margin:5px 0">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                </button>
                </span>
            </form>
            <p><b>Tình trạng: </b>Còn hàng</p>
            <p><b>Danh mục:</b> {{$pro->category_name}}</p>
            <p><b>Thương hiệu:</b> {{$pro->brand_name}}</p>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Nội dung sản phẩm</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#reviews" data-toggle="tab">Đánh giá sản phẩm</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$pro->product_content!!}</p>
        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$pro->product_desc!!}</p>
        </div>

        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>Việt Nam</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>3 DEC 2022</a></li>
                </ul>
                <p><b>Đánh giá của bạn</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Tên của bạn"/>
                        <input type="email" placeholder="Địa chỉ email của bạn"/>
                    </span>
                    <textarea name=""></textarea>
                    <b>Đánh giá: </b> <img src="{{asset('public/frontend/images/rating.png')}}" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Gửi đánh giá
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<!--/category-tab-->
@endforeach
<div class="recommended_items" style="padding-top: 10px">
    <!--recommended_items-->
    <h2 class="title text-center">Sản phẩm gợi ý</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate as $key => $recommended)
                <a href="{{URL::to('chi-tiet-san-pham/'.$recommended->product_id)}}">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/product/'.$recommended->product_image)}}" alt="" />
                                <h2>{{'$'.number_format($recommended->product_price, 2, '.',',')}}</h2>
                                <p>{{$recommended->product_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
             
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!--/recommended_items-->

@endsection
