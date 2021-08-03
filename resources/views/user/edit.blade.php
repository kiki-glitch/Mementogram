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
		
		<div class="flex items-center justifycenter pt-10 flex-col mb-4">
		
		<div class="w-6/12 bg-white  rounded-lg">
			<div class="flex items-center justifycenter pt-5 flex-row">
			

			<img src="/upload/avatars/{{$user->avatar}}" class="rounded-full w-32 m-4">

			<h1 class="text-gray-800 font-semibold text-xl mt-5">{{ $user->username }}'s Profile</h1>
			
		
			</div>

			<div class="flex items-center justifycenter pt-5 flex-col">
				<form action="{{ route('user.avatarupdate') }}" method="post" enctype="multipart/form-data" >

					<label>Update Profile Image</label><br>
					<input type="file" name="avatar">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded  w-4/12 float-right">
					
				</form>


			</div>
		</div>
		
		

	</div>

		<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg">
			<form action="{{ route('user.update') }}" method="post" >
				@csrf

				@if(session('success'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success')}}

				</div>
				@endif

				<div class="mb-4">
					<label for="first_name" class="sr-only">First name
					</label>
					<input type="text" name="first_name" id="first_name" placeholder="First name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->First_name }}">

					@error('first_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				</div>

				<div class="mb-4">
					<label for="last_name" class="sr-only">Last name
					</label>
					<input type="text" name="last_name" id="last_name" placeholder="Last name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->Last_name }}">

					@error('last_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div class="mb-4">
					<label for="username" class="sr-only">Username
					</label>
					<input type="text" name="username" id="username" placeholder="Change Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->username }}">

					@error('username')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				</div>

				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->email}}">
				 

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror



				</div>


				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">Update</button>
				</div>

			</form>	
		</div>
		

	</div>
		
		

	</div>
		</div>
	</div>


	</div>


	</div>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection