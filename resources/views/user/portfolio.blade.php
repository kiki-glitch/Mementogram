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

		<div class="w-6/12 bg-white p-6 rounded-lg mb-6">
			<div class="mb-2">
				Your Description
			</div>

			<form action="{{ route('user.description_update') }}" method="post" >
				@csrf

				@if(session('success'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success')}}

				</div>
				@endif

				<div class="mb-4">
					<label for="about_me" class="sr-only">About me
					</label>
					<input type="text" name="about_me" id="about_me" placeholder="About me" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->about_me }}">

				</div>

				@error('about_me')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror
				
				<div class="mb-4">
					<label for="location" class="sr-only">Location
					</label>
					<input type="text" name="location" id="location" placeholder="Your Location" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->location }}">

				</div>
				
				@error('location')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div class="mb-4">
					<label for="industry" class="sr-only">Industry
					</label>
					<input type="text" name="industry" id="industry" placeholder="Your Industry e.g Sports,Music" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->industry }}">

				</div>

				@error('industry')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full mb-3 ">Submit</button>
				</div>

			</form>	
		</div>
		

	</div>

	<div class="float-right mb-6 text-blue-600 hover:text-blue-300">
		<a href="{{ route('portfolio.view') }}">View</a>
	</div>


	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Your Portfolio
			</div>

			<form action="{{ route('media.portfolio') }}" method="post" enctype="multipart/form-data">
				@csrf

				@if(session('success2'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success2')}}

				</div>
				@endif


				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

				<label>Add Portfolio Image </label><br>
					<input type="file" name="portfolio_file">

					@error('portfolio_file')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

					<div class="mb-4">
					<label for="description" class="sr-only">Image/Video Description
					</label>
					<input type="text" name="description" id="description" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">	

				</div>

					@error('description')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full mb-3 ">Submit</button>
				</div>

				

			</form>	
		</div>
		

	</div>
		

	<div class="float-right mb-4 text-blue-600 hover:text-blue-300 ">
		<a href="{{ route('socials.view') }}">View</a>
	</div>

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Your Social Links
			</div>

			<form action="{{ route('media.links') }}" method="post">
				@csrf

				@if(session('success3'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success3')}}

				</div>
				@endif

				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

				<div class="mb-4">
					<label for="social_link" class="sr-only">Social Media
					</label>
					<input type="text" name="social_link" id="social_link" placeholder="Social Link eg. Facebook" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

				</div>
				
				@error('social_link')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
				@enderror


				<div class="mb-4">
					<label for="url" class="sr-only">Social Link Url
					</label>
					<input type="url" name="url" id="url" placeholder="Social link Url" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=""> 

				</div>

				@error('url')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">Upload</button>
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