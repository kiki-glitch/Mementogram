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
		
		<!--<div class="flex items-center justifycenter pt-10 flex-col mb-4">
		
		
			<div class="flex items-center justifycenter pt-5 flex-row">
			
		
		

	</div>-->
	

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Editting Your Social Links
			</div>

			<form action="{{ route('socials.update') }}" method="post">
				@csrf

				@if(session('success3'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success3')}}

				</div>
				@endif

				
				<input type="hidden" name="id" value="{{ $socials['id']}}">
				<input type="hidden" name="user_id" value="{{ $socials['user_id']}}">
				<div class="mb-4">
					<label for="social_link" class="sr-only">Social Media
					</label>
					<input type="text" name="social_link" id="social_link" placeholder="Social Link eg. Facebook" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $socials['social_media'] }}">

				</div>
				
				@error('social_link')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
				@enderror


				<div class="mb-4">
					<label for="url" class="sr-only">Social Link Url
					</label>
					<input type="url" name="url" id="url" placeholder="Social link Url" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $socials['URL'] }}"> 

				</div>

				@error('url')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

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