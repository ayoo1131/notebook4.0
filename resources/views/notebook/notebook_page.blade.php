<!DOCTYPE html>

<html>
<head>
	<title>Notebook Dashboard</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>

	@if(isset(Auth::user()->username))
		<div class="alert alert-danger success-block">
		<strong>Welcome {{ Auth::user()->username }}</strong><br>
		<p>{{Auth::user()->email}}</p>
		<a href="{{ url('logout') }}">Logout</a>
		</div>
  	@else
    	<script>window.location = "login_page";</script>
   	@endif


</body>