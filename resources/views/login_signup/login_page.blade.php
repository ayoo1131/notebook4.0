<!DOCTYPE html>

<html>
<head>
	<title>Notebook Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>
	<h1> Notebook Login</h1>
	@csrf

	@if(Session::has('signup_message_success'))
		<p class="sign_up_success">{!! session('signup_message_success')!!}</p>
	@endif

	@if (Session::has('login_message_error'))
		<p class="login_error">{!! session('login_message_error')!!}</p>
	@endif

	<form action="login_user" method="post">
		@csrf

		<div>
			<label for="username">Username</label>
			<input type="test" id="username" name="username">
			@if ($errors->has('username'))
                <p class="sign_up_error">{{ $errors->first('username') }}</p>
            @endif

		</div>
	
		<div>
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
			@if ($errors->has('password'))
                <p class="sign_up_error">{{ $errors->first('password') }}</p>
            @endif
		</div>

		<div>
			<button type="submit" name="login_button" id="login_button">Login </button><br><br><br>
		</div>
	</form>

	<form action="signup_page" method="POST">
	@csrf
		<h3>Don't have an Account?</h3>
		<button type="submit">Sign up</button>
	</form>

</body>

</html>
