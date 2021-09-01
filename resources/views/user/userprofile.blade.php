@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	<!--sidebar-->
	@include('layout.sidebarOption2')	
	<!--content-->

	<div class="flex-1 p-10  font-bold">
		
		<div class="flex items_center justify-center">
		
		<div class="w-6/12 bg-white mt-10 rounded-lg">
			<div class="flex items-center justifycenter pt-10 flex-col">
			

			<img src="/upload/avatars/{{$user->avatar}}" class="rounded-full w-32">

			<h1 class="text-gray-800 font-semibold text-xl mt-5">{{ $user->username }}'s Profile</h1>
			
			
			<h1 class="text-gray-800 font-semibold text-xl mt-5">{{ $user->First_name }} </h1>
			<h1 class="text-gray-800 font-semibold text-xl mt-5"> {{ $user->Last_name }}</h1>
			<h1 class="text-gray-400 text-sm p-4">{{ $user->email }}</h1>
		
			</div>
		</div>
		

		

	</div>

		
		</div>
		</div>



	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection