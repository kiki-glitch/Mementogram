<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Navbar</title>

	<!--Google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

	<!-----CSS----->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/hiquip.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/portfolio.css') }}">
	<!--Tailwind css-->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="https://kit.fontawesome.com/8d7466dea7.js" crossorigin="anonymous"></script>

	 <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	
	<style>
.dropdown:focus-within .dropdown-menu {
  opacity:1;
  transform: translate(0) scale(1);
  visibility: visible;
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


</head>
<body class="bg-gray-100">
		<nav class="p-6 bg-white flex justify-between ">
			<ul class="flex items-center">
				<li>
					<a href="/" class="p-3 hover:text-blue-500">Home</a>
				</li>
				<li>
					<a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
				</li>
				<li>
					<a href="{{url('portfoliohub')}}" class="p-3">Portfolio</a>
				</li>
				<li>
					<a href="{{ route('hiquip') }}" class="p-3">Hiquip</a>
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

					<!--<li class="ml-6">
						<div class="relative">
						<button class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-black">
							<img class="h-full w-full object-cover" src="/upload/avatars/{{ auth()->user()->avatar }}">
						</button>
						<div class="absolute top-0 right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl ">
							<a href="#" class="block px-4 py-2 text-gray-800 hover:text-color-red-500">My Profile</a>
							<a href="" class="block px-4 py-2 text-gray-800 hover:text-color-red-500">My Profile</a>
							<a href="" class="block px-4 py-2 text-gray-800 hover:text-color-red-500">My Profile</a>
							<a href="" class="block px-4 py-2 text-gray-800 hover:text-color-red-500">My Profile</a>
						</div>
					</div>
					</li>-->
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


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src=" {{ mix('js/app.js') }}"></script>
</body>
</html>


