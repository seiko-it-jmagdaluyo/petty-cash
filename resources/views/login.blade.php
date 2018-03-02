<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ config('app.name') }} | Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" type="text/css" href="/css/login.css">
	</head>
	<body>
		
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
				<div class="wrap-login100">
					<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}

						<span class="login100-form-logo">
							<i class="zmdi zmdi-landscape"></i>
						</span>

						<span class="login100-form-title p-b-34 p-t-20">
							Log in
						</span>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="wrap-input100 validate-input" data-validate = "Enter email address">
								<input id="email" type="email" class="input100" name="email" value="{{ old('email') }}"  placeholder="Email Address" autofocus>
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input class="input100" type="password" id="password" name="password" placeholder="Password">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="contact100-form-checkbox">
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="input-checkbox100" id="ckb1">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>

						<div class="text-center p-t-20">
							<a class="txt1" href="{{ route('password.request') }}">
								Forgot Password?
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="/js/pages/login.js"></script>
	</body>
</html>