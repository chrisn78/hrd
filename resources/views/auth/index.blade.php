<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login HR System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ url('backend/login1/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/fonts/font-awesome470/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/fonts/Linearicons-Free-v1/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('backend/login1/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body style="background-color: #fffefe;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                 <form action="{{ route('login') }}" method="post" class="login100-form validate-form" style="padding-top: 50px; background-color:white;">
                    @csrf
                    <div class="container">
                    <div class="row justify-content-center">
                        <img src="{{ url('backend/logo.png')}}" width="200px" class="center">
                    </div>
                    </div>
                    <span class="login100-form-title p-b-34" style="font-weight: bold">
                        Platinum Hotel & Convention Hall Balikpapan
                    </span>
                    <span class="login100-form-title p-b-34" style="font-weight: bold">
                        HR System
					</span>
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							{{-- <label class="label-checkbox100" for="ckb1">
								Remember me
							</label> --}}
						</div>

						<div>
							{{-- <a href="#" class="txt1">
								Forgot Password?
							</a> --}}
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					{{-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div> --}}

					{{-- <div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> --}}
				</form>

				<div class="login100-more" style="background-image: url('backend/login1/images/platinum.jpg');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ url('backend/login1/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ url('backend/login1/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login1/js/main.js')}}"></script>

</body>
</html>
