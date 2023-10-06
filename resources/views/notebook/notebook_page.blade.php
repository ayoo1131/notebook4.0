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
			<h1>{{ Auth::user()->username }}'s Notebook</h1>

			<form action='logout'>
				<button type="submit" style="position:absolute; right:0; top:0">Logout</button>
			</form>

		</div>
  	@else
    	<script>window.location = "login_page";</script>
   	@endif


</body>