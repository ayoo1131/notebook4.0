<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>
    <!-- @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif -->

	<h1>Create Notebook Account</h1>

	<form action="signup_new_user" method="post">
    <!-- <form action="{{ url('signup_new_user') }}" method="post"> -->
		@csrf

        @if(Session::has('signup_message_success'))
			<div>
				<p>{!! session('signup_message_success')!!}</p>
			</div>
		@endif

		<div>
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
            @if ($errors->has('username'))
                <p class="sign_up_error">{{ $errors->first('username') }}</p>
            @endif
        </div>

        <div>
			<label for="email">Email</label>
			<input type="text" id="email" name="email">
            @if ($errors->has('email'))
                <p class="sign_up_error">{{ $errors->first('email') }}</p>
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
			<label for="password_repeat">Password Repeat</label>
			<input type="password" id="password_repeat" name="password_repeat">
            @if ($errors->has('password_repeat'))
                <p class="sign_up_error">{{ $errors->first('password_repeat') }}</p>
            @endif
		</div>

		<div>
			<button type="submit" name="signup_button" id="signup_button">Sign up</button><br><br><br>
		</div>
	</form>

<form action = "login_page" method="POST">
	@csrf
	<button type="submit">Go Back</button>
</form>

</body>

</html>
