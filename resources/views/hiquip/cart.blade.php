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
		
	
		<h2 class="mt-6">Your cart</h2>
	

		
		<div class="text-center mb-3">

   			Products
      </div>


   		@if($cartItems->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               Product ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Category
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Name
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Price
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Quantity
              </th>
    
              <th scope="col" class="relative px-6 py-3">
                <span class="">Action</span>
              </th>
            </tr>
          </thead>

        @foreach($cartItems as $item)

          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $item['id'] }}
              </td>      
            
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $item['name'] }}
                </div>
                
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	Visuals
                </div>
            	</td>
              
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  

                  {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum()}}

                </div>
                
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	<form action="{{ route('cart.update',$item->id) }}" method="post">	

                		@csrf

	                  <input type="number" name="quantity" value="{{ $item -> quantity }}" class="border-2 w-full p-4 rounded-lg">
	                  <input type="submit" value="save"> 

                  </form>
                </div>
                
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('cart.destroy', $item->id) }}" onclick="return confirm('Are You Sure You want to Delete Item?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
            </tr>

            <!-- More items... -->
          </tbody>
          @endforeach
        </table>

      </div>
    </div>
  </div>
</div>

<h3 class="mt-4 ">
	Total Price: Ksh.{{ \Cart::session(auth()->id())->getTotal()}}
</h3>

<a href="{{ route('cart.checkout')}}"><button class="bg-blue-500 text-white px-6 py-3 rounded font-medium">Proceed to Checkout</button></a>
		@else

		<div class="mt-6 text-center">
			No Products Added to Cart
		</div>
		@endif

		

	</div> 
</div>		
</body>
</html>