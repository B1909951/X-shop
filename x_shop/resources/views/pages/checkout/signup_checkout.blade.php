@extends('layout')
@section('content')
<section id="form" style="margin-top: 0px">
    <!--form-->
    <div class="container-fluid" >
        <h2 class="title text-center" style="padding-top:10px ">Đăng ký</h2>
        <div class="row">
            
            <div class="col-sm-10 col-sm-offset-1">
                <div class="signup-form" style="text-align: center">
                    <!--sign up form-->
                    <?php 
	                    $message = Session::get('message');
	                    if($message){
		                    echo '<span style="color:red; text-align: center; width: 100%; font-weight:bold">'. $message .'</span>' ;
		                    Session::put('message',null);
	                    }
	                ?>
                    <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="customer_name" placeholder="Tên người dùng" required/>
                        <input type="email" name="customer_email" placeholder="Địa chỉ Email" required/>
                        <input type="password" name="customer_password" placeholder="Mật khẩu" required/>
                        <input type="text" name="customer_phone" placeholder="Số điện thoại" required/>
                        <button type="submit" class="btn btn-default" style="margin:10px auto">Đăng ký</button>
                        
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection