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
					<a href="/" class="p-3 hover:text-blue-500">Home</a>
				</li>
				<li>
					<a href="{{ route('dashboard') }}" class="p-3 hover:text-blue-500">Dashboard</a>
				</li>
				<li>
					<a href="{{url('portfoliohub')}}" class="p-3 hover:text-blue-500">Portfolio</a>
				</li>
				<li>
					<a href="{{ route('hiquip') }}" class="p-3 hover:text-blue-500">Hiquip</a>
				</li>
				
			</ul>

			<ul class="flex items-center">
				@auth
					<li>
					<a href="" class="p-3 hover:text-blue-500">{{ auth()->user()->username }}</a>
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
					<a href="{{ route('login') }}" class="p-3 hover:text-blue-500">Sign in</a>
				</li>
				<li>
					<a href="{{ route('register') }}" class="p-3 hover:text-blue-500">Sign up</a>
				</li>
				@endguest

				
				<li>
					<a>
						<div class="flex flex-row space-x-2">
						<div>	
						<i class="fas fa-shopping-cart hover:text-blue-500">
						</i>
						</div>
            			<div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-xs px-3 bg-blue-500 text-white rounded-full">
            			@auth
            				{{ \Cart::session(auth()->id())->getContent()->count() }}
            			@endauth
            			</div>
            		</div>
				</a>
				</li>

			</ul>
		</nav>


		<div class="relative min-h-screen flex">

	<!--sidebar-->
	<div class="w-64 h-screen bg-gray-900 rounded-md overflow-y-scroll ">
	
	<nav>
	<div class="">
		<div class="pc-6 pt-8">
		<div class="flex items-center justify-between">
			<a href="#" class="bg-blue-600 p-1.5 rounded flex items-center justify-center">Mementogram</a>
			
			<button class="flex items-center justify-center p-8.5 rounded bg-gray-800"><i class="fas fa-arrow-left"></i></button>
		</div>	

	</div>
	<div class="px-6 pt-4">
		
	</div>

	<div class="px-6 pt-4 ">
		<hr class="border-gray-700">
	</div>
	<div class="px-6 pt-4">

		<ul class="flex flex-col space-y-2 ">
			<li class="relative text-gray-500 hover:text-white focus-within:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-camera w-5 h-5 stroke-current"></i></div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-800">Camera</a>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					
					<i class="fas fa-video h-5 stroke-current"></i></div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2  rounded text-xs hover:bg-gray-800">Video</a>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-microphone w-5 h-5 stroke-current"></i>

				</div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Sound</a>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-box w-5 h-5 stroke-current"></i>
				</div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2  rounded text-xs hover:bg-gray-800">Packages</a>
			</li>				
		</ul>
	</div>
	
	</div>

</nav>
	

			<!--end of navbar-->

</div>
	<!--content-->

	<div class="flex-1 p-10 font-bold">

		<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Check Out
			</div>

			<form action="{{ route('orders.store')}}" method="post">
				@csrf

				<input type="hidden" name="user_id" value="{{auth()->id()}}">
				<div class="mb-4">
					<label for="name" class="sr-only">Full name
					</label>
					<input type="text" name="name" id="name" placeholder="Full name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('name')}}">

					@error('name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>
				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('email')}}">

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>	
				<div class="mb-4">
					<label for="last_name" class="sr-only">Location
					</label>
					<input type="text" name="location" id="last_name" placeholder="Location" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('last_name')}}">

					@error('location')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div class="mb-4">
					<label for="username" class="sr-only">Phone Number
					</label>
					<input type="number" name="phone" id="phone" placeholder="Phone number" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('phone')}}">
					<small>Format: 07-2456-7890</small>

					@error('phone')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mt-4">
			  <span class="text-gray-700">Account Type</span>
			  <div class="mt-2">
			    <label class="inline-flex items-center">
			      <input type="radio" class="form-radio" name="payment_method" value="cash">
			      <span class="ml-2">Cash on delivery</span>
			    </label>
			    <label class="inline-flex items-center ml-6">
			      <input type="radio" class="form-radio" name="payment_method" value="mpesa">
			      <span class="ml-2">Mpesa</span>
			    </label>
			  </div>
			</div>
			@error('payment_method')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror
			<!--
				<div class="mb-4">
					<label for="password" class="sr-only">Password
					</label>
					<input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('password')}}">

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="password_confirmation" class="sr-only">Repeat Password 
					</label>
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repaeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

					@error('password_confirmation')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>-->

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Place Hire Order</button>
				</div>

			</form>
		

	</div>

	</div>

	</div>	
</div>

</body>
</html>