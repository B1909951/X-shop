@extends('layout')
@section('slider')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="slider-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#slider-carousel" data-slide-to="1"></li>
					<li data-target="#slider-carousel" data-slide-to="2"></li>
				</ol>
				
				<div class="carousel-inner">
					<div class="item active">
						
						<div class="col-sm-12">
							<img src="{{asset('public/frontend/images/sale1.jpg')}}" class="girl img-responsive" alt="" />
						</div>
					</div>
					<div class="item">
						
						<div class="col-sm-12">
							<img src="{{asset('public/frontend/images/sale2.jpg')}}" class="girl img-responsive" alt="" />
						</div>
					</div>
					
					<div class="item">
						
						<div class="col-sm-12">
						<img src="{{asset('public/frontend/images/sale3.jpg')}}" class="girl img-responsive" alt="" />
						</div>
					</div>
					
				</div>
				
				<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
			
		</div>
	</div>
</div>
@endsection
@section('content')
                    <div class="features_items text-center" style=" margin-bottom: 15px"><!--features_items-->

						<h2 class="title text-center" style="padding-top:10px ">Sản phẩm mới</h2>
						
						@foreach($all_product as $key => $product)
						<a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
							<div class="col-sm-4 product new-product">
								<div class="product-image-wrapper">
									<div class="single-products text-center">
										<form action="{{URL::to('/save-cart')}}" method="POST">
											{{ csrf_field() }}
											<div class="productinfo text-center">
												
												<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
												<h2>{{'$'.number_format($product->product_price, 2, '.',',')}}</h2>
												<p>{{$product->product_name}}</p>
												<input type="hidden" name="qty" value="1" />
												<input name="productid_hidden" type="hidden" value="{{$product->product_id}}"/>
												<button type="submit" class="btn btn-fefault cart" style="margin:5px 0">
													<i class="fa fa-shopping-cart"></i>
													Thêm vào giỏ hàng
											</button>
											</div>
										</form>
									</div>
									
								</div>
							</div>
						</a>
						@endforeach
						
						
					</div ><!--features_items-->
					<div style="text-align: center"><a href="{{URL::to('all-product-home')}}" class="all_product" >Xem tất cả</a></div>
					
					
                    {{-- <div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
											</div>
											
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div><!--/category-tab--> --}}
                    {{-- <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend2.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend3.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend2.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend3.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items--> --}}
@endsection
