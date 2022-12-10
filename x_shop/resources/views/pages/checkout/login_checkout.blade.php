@extends('layout')
@section('content')
<section id="form" style="margin-top: 0px">
    <!--form-->
    <div class="container-fluid" >
        <h2 class="title text-center" style="padding-top:10px ">Đăng nhập</h2>
        <div class="row" >
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-form" style="text-align: center">
                    <!--login form-->
                    
                    
                    <?php 
	                    $message = Session::get('message');
	                    if($message){
		                    echo '<span style="color:red; text-align: center; width: 100%; font-weight:bold">'. $message .'</span>' ;
		                Session::put('message',null);
	                    }
	                ?>
                    <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="email" name="email_account" placeholder="Địa chỉ Email" required/>
                        <input type="password" name="password_account" placeholder="Mật khẩu" required />
                        <span>
                            <a href="{{URL::to('signup-checkout')}}" style="color: #fc4f13">Đăng kí ngay</a>
                        </span>
                        <button type="submit" class="btn btn-default" style="margin:10px auto">Đăng nhập</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            
        </div>
    </div>
</section>
<!--/form-->
@endsection