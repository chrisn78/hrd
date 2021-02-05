<!DOCTYPE html>
<html lang="en">
<head>
	<title>HR Sytem</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form action="{{ route('login') }}" method="post" class="login100-form validate-form" style="padding-top: 50px;">
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
					<span class="login100-form-title p-b-34">
						Account Login
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
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type Email">
						<input id="first-name" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					{{-- <div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							<br>
						</span>

					</div> --}}

					<div class="w-full text-center" style="padding-top: 40px">
						<a href="#" class="txt3">
							Authorized User Only
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('backend/login/images/platinum.jpg');"></div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ url('backend/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ url('backend/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ url('backend/login/js/main.js')}}"></script>

</body>
</html>
