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
			<a href="{{route('portfolio')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Edit portfolio</a>
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
		
		<div clss="w-full min-h-screen bg-blue-50 p-6">
			<h1 class="font-bold text-xl text-center">
				Your Portfolios
			</h1>

		<!---Portfolio view--->
		<!--<div class="flex">

		<div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">
			
			
				<img src="/upload/avatars/default.png" alt="" class=" h-20 ">

				<h2 class="text-center px-2 pb-5">Description<h2>

				<h2 class="bg-blue-500 text-white p-3 text-center">Time created</h2>

			
		</div>

	

		</div>-->
		@if($portfolios->count() > 0)
		@foreach($portfolios as $portfolio)

		@if(session('msg'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('msg')}}

				</div>
				@endif

		<div class=" ">
			
			<div>
			<img src="/upload/portfolios/{{ $portfolio['media'] }}" alt="" class=" ">
			<h2 class="text-left px-2 pb-5">Description:{{ $portfolio['description'] }}<h2>
			<h2 class="bg-blue-500 text-white p-3 text-left">Time created:<span class="text-gray-600 text-sm">{{ $portfolio->created_at->diffForHumans() }}</span></h2>
			@if($portfolio['deleted_at'] == null)
			<a href="{{ "edit/".$portfolio['id'] }}" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg px-6 py-2 m-2 float-left">Edit</a>
			<a href="{{ "disable/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Disable Your Portfolio?')" class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-6 py-2 m-2 float-right">Disable</a>
			</div>
			@else
			<a href="{{ "restore/".$portfolio['id'] }}" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg px-6 py-2 m-2 float-left">Restore</a>
			<a href="{{ "force_delete/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Delete?')" class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-6 py-2 m-2 float-right">Delete</a>
			</div>
			@endif
		@endforeach
		@else

		<div class="mt-6 text-center">
			No posts
		</div>
		@endif

	
			
		</div>
		</div>

		
	


	
		

	

	</div>
		</div>
	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection