

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/backend/lib1/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib1/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/backend/css1/bootstrap1.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('public/backend/css1/style1.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{URL::to('/admin')}}" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Admin</h3>
                            </a>
                            <h3>????ng nh???p</h3>
                        </div>
						<?php 
							$message = Session::get('message');
							if($message){
								echo '<span style="color:red; text-align: center; width: 100%; font-weight:bold">'. $message .'</span>' ;
								Session::put('message',null);
							}
						?>
						<form action="{{URL::to('/admin-dashboard')}}" method="post">
							{{ csrf_field() }}
	                        <div class="form-floating mb-3">
	                            <input type="email" class="form-control" name="admin_email" id="floatingInput" placeholder="name@example.com" required>
	                            <label for="floatingInput">Email</label>
	                        </div>
	                        <div class="form-floating mb-4">
	                            <input type="password" class="form-control" name="admin_password" id="floatingPassword" placeholder="M???t kh???u" required>
	                            <label for="floatingPassword">M???t kh???u</label>
	                        </div>
	                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">????ng nh???p</button>
	                    </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/backend/lib1/chart/chart.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('public/backend/lib1/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('public/backend/js1/main1.js')}}"></script>
</body>

</html>