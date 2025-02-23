@extends('layout')

@section('title')
    Login
@endsection

@section('style-link')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('images\loginimg.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{route('loginAttempt')}}" method="post">
                @csrf
					<span class="login100-form-title">User Login</span>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="{{ route('forgotPassword') }}">
							Forgot Password
                            <i class="fa fa-question m-l-5" aria-hidden="true"></i>
						</a>
					</div>

                    <div class="text-center p-t-12">
						<a class="txt2" href="{{ route('loginPageAdmin') }}">
							Admin Login
                            <i class="fa fa-user m-l-5" aria-hidden="true"></i>
						</a>
					</div>

					<div class="text-center p-t-80">
						<a class="txt2" href="{{route('registerPage')}}">
							Create Your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
