<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Mementogram</title>

	<!--Google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

	<!-----CSS----->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/hiquip.css') }}">
	

	<!--Tailwind css-->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="https://kit.fontawesome.com/8d7466dea7.js" crossorigin="anonymous"></script>
	
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	

</head>
<body >
		<nav class="p-6 bg-white flex justify-between ">
			<ul class="flex items-center">
				<li>
					<a href="/" class="p-3 ">Home</a>
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
				
				<li><a><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
		</nav>


		<div class="relative min-h-screen flex">

	<!--sidebar-->
	<div class="bg-gray-500 text-black-100 w-64 space-y-6 px-4">
	<!--logo-->
		

		<a href="" class="text-white flex items-center space-x-2">
			logo
		</a>

		<span class="text-2xl">Mementogram</span>

	<!--nav-->

		<nav>
			<a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Camera</a>
			<a href="{{ route('portfolios.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400"> Sound Equip</a>
			<a href="{{ route('usersocials.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Microphone</a>
			<form action="{{ route('logout') }}" method="post" class="p-3 inline">
						@csrf
						<button type="submit" class="block py-2.5 px-4" >Logout</button>
					</form>
		</nav>



	</div>		

	<!--content-->

	<div class="flex-1 p-10  font-bold">
		
		<div class="py-24 flex items-center justify-center">
			
		<!--card goes here-->

		<div class="bg-white rounded-lg shadow-2xl w-3/4">

			<!--image--->
			<div class="flex">

			<img src="/upload/hiquip/camera.jpg" class="rounded-t-lg h-60 object-cover w-1/3">

			<!---content-->
			<div class="p-8">
				<h2 class="text-xl font-extrabold mb-5">
				Hi there.
			</h2>
				<p>This is a card</p>

				<button class="bg-blue-500 text-blue-50 rounded-lg py-2 px-4 mt-5">Add to cart
				</button>
			</div>

		</div>

			<!--footer--->
			<footer class="bg-gray-100 rounded-b-lg text-right py-3 px-8 text-xs text-gray-500">Updated 3 days ago
			</footer>
		</div>

		</div>

	</div>
</div>		
</body>
</html>