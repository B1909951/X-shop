<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ | X-Shop</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main1.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive1.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/mycss1.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
		<div class="header-middle" style="background-color: #F0F0E9"><!--header-middle-->
			<div class="container" >
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left" >
							<a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/logo.jpg')}}" height=60px alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right" style="margin: auto" >
							<ul class="nav navbar-nav" >
								
								<?php 
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL){

								?>
										<li><a href="{{URL::to('/show-checkout/'.$customer_id)}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-user"></i>Thông tin</a></li>
										
								<?php
									}else{
								?>
										<li><a href="{{URL::to('/login-checkout')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-user"></i>Thông tin</a></li>
								<?php
									}
							    ?>
								<?php 
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL){

								?>
										<li><a href="{{URL::to('/show-history/'.$customer_id)}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-clock-o"></i>Lịch sử</a></li>
									
								<?php
									}else{
								?>
										<li><a href="{{URL::to('/login-checkout')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-clock-o"></i>Lịch sử</a></li>
								<?php
									}
								?>
								<?php 
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id==NULL ){

								?>
										<li><a href="{{URL::to('/show-checkout/'.$customer_id)}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-pencil-square-o"></i> Thanh toán</a></li>
										
								<?php
									}elseif($customer_id!=NULL && $shipping_id!=NULL ){
								?>
										<li><a href="{{URL::to('/payment')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-pencil-square-o"></i> Thanh toán</a></li>
								<?php
									}else{
								?>
										<li><a href="{{URL::to('/login-checkout')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-pencil-square-o"></i> Thanh toán</a></li>
								<?php
									}
							    ?>
								<li><a href="{{URL::to('/show-cart')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php 
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL){

								?>
										<li><a href="{{URL::to('/logout-checkout')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-unlock"></i> Đăng xuất</a></li>
										
								<?php
									}else{
								?>
										<li><a href="{{URL::to('/login-checkout')}}" style="background-color: #F0F0E9; font-size:18px"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php
									}
							    ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom" ><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								{{-- <li><a href="#">Sản phẩm<i></i></a>
                                </li> 
								<li><a href="#">Tin tức<i></i></a>
                                    
                                </li>  --}}
								<li><a href="{{URL::to('/show-cart')}}"> Giỏ hàng</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
							{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="keywords_search" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" name="search_button" style="background-color:#fc4f13; color:#F0F0E9" class="btn btn-default btn-sm " value="Tìm kiếm">

						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		@yield('slider')
	</section><!--/slider-->
	
	<section>
		<div class="container" >
			<div class="row" >
				<div class="col-sm-3"style="padding-top:10px ">
					<div class="left-sidebar" style="padding-top: 0px">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $key => $cate)				
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key => $bra)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$bra->brand_id)}}">{{$bra->brand_name}}</a></li>
									@endforeach
								</ul>
								
							</div>
						</div><!--/brands_products-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		{{-- <div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>X</span>-shop</h2>
							<p>Uy tín - Hiện đại - Chất lượng</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2021</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('public/frontend/images/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ với chúng tôi</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Danh mục</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($category as $key => $cate)
									<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thương hiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($brand as $key => $bra)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$bra->brand_id)}}">{{$bra->brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin Shop</a></li>
								<li><a href="#">Chăm sóc khách hàng</a></li>
								<li><a href="#">Địa chỉ Shop</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Thông tin thêm về Shop</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Vui lòng gửi địa chỉ email của bạn đến Shop<br />Chúng tôi sẽ liên hệ bạn sớm nhất có thể</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>