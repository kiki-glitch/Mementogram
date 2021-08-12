@extends ('layout.nav')

@section('content')

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
			<a href="{{ route('admin_user.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Users View</a>
			<a href="{{ route('portfolios.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400"> Portfolios View</a>
			<a href="{{ route('usersocials.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">User Socials View</a>
			<a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Hiquip</a>
			<a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Portfolios</a>
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
			Admin Page
		</div>
	</div>
		
		

	</div>
	
		

	</div>
		</div>
	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection

