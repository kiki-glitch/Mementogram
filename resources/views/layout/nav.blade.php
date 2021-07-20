<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Navbar</title>

	<!-----CSS----->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

	<!--Tailwind css-->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

	<!--Bootstrap

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

</head>
<body class="bg-gray-100">
		<nav class="p-6 bg-white flex justify-between mb-6">
			<ul class="flex items-center">
				<li>
					<a href="" class="p-3 ">Home</a>
				</li>
				<li>
					<a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
				</li>
				<li>
					<a href=" " class="p-3">Hiquip</a>
				</li>
				
			</ul>

			<ul class="flex items-center">
				@auth
					<li>
					<a href="" class="p-3">{{ auth()->user()->username }}</a>
					</li>

					<li>
					<form action="{{ route('logout') }}" method="post" class="p-3 inline">
						@csrf
						<button type="submit" class="hero-btn" >Logout</button>
					</form>
					</li>
				@endauth
				
				@guest
				<li>
					<a href="{{ route('login') }}" class="p-3">Sign in</a>
				</li>
				<li>
					<a href="{{ route('register') }}" class="p-3">Sign up</a>
				</li>
				@endguest
				
			</ul>
		</nav>


		@yield('content')
</body>
</html>


