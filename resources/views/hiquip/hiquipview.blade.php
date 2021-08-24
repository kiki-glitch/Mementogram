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
  	<!--
		<div class="container mb-5 mt-5">
			<div class="row">-->
			
			<!--Cards--->
			<!--
			<div class="col-md-4">
				<div class="card mt-3">
					<div class="product-1 align-items-center p-2 text-center">
						<img src="/upload/hiquip/Boom pole.jpg" alt="" class="rounded" width="160">
						<h5>Boom Play</h5>-->
						<!--card-info--->
						<!--
						<div class="mt-3 info">
							<span class="text1 d-block">Lorem ipsum sit amet.</span>
							<span class="text1">
								Lorem ipsum dolor 
							</span>
						</div>
					<div class="cost mt-3 text-dark">
						<span>Ksh.3000</span>
						<div class="star mt-3 align-items-center">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>

						</div>
					</div>
					</div>
					-->
					<!---button-->
					<!--
					<div class="p-3 shoe text-center text-white mt-3 cursor">
						<span class="text-uppercase">Add to cart</span>
					</div>
				</div>
			</div>-->
			<!--card 1 ends here-->
		<!--</div>
		</div>
	</div>	-->
	<div class="hiquip_content">
	<div class="hiquip_container">
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/camera.jpg" alt="">
				<ul class="action">
				  <li>
				  <i class="fas fa-shopping-cart"></i><span>Add to Cart</span>
				  </li>
				  <li>
				  <a href="{{ route('hiquip.product') }}"><i class="fas fa-eye"></i><span>View</span></a>
				  </li>
				  <li><i class="far fa-heart"></i>
				  	<span>Add to Wishlist</span>
				  </li>
				</ul>
			</div>
		<div class="content">
			<div class="productName">
				<h3>Camera</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.5,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/video_lighting.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Video Lighting</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.20,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/Boom pole.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Boom Pole</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.15,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/camera.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Camera</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.5,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star grey"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/video_lighting.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Video Lighting</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.20,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/Boom pole.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Boom Pole</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.15,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/camera.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Camera</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.5,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/video_lighting.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Video Lighting</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.20,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star grey"></i>
				</div>
			</div>
		</div>
		</div>
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/hiquip/Boom pole.jpg" alt="">
			</div>
		<div class="content">
			<div class="productName">
				<h3>Boom Pole</h3>
			</div>
			<div class="price_rating">
				<h2>Ksh.15,000</h2>
				<div class="rating">
					<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src=" {{ mix('js/app.js') }}"></script>

</body>
</html>