@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



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
			<a href="{{ route('user.profile')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">My Account</a>
			<a href="{{ route('portfolio') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Edit portfolio</a>
			<a href="{{ route('user.edit')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Edit profile</a>
			<a href="{{ route('password.edit')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Change Password</a>
			<a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Public View</a>
			<a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Settings</a>
			<form action="{{ route('logout') }}" method="post" class="p-3 inline">
						@csrf
						<button type="submit" class="block py-2.5 px-4" >Logout</button>
					</form>
		</nav>



	</div>		

	<!--content-->

	<div class="flex-1 p-10  font-bold">
		
		<div class="flex justify-center">
		
			<div class="w-8/12 bg-white p-6 rounded-lg">
			User Dashboard Page
		</div>
	</div>
		

	</div>
		
		

	</div>
		
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection