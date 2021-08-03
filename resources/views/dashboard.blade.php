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
		
		<div class="w-6/12 bg-white p-6 rounded-lg">
			<form action=" " method="post" id="userupdateform">
				@csrf
				<div class="mb-4">
					<label for="first_name" class="sr-only">First name
					</label>
					<input type="text" name="first_name" id="first_name" placeholder="First name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->First_name }}">

					<span class="text-danger error-text first_name_error"></span>

				</div>

				<div class="mb-4">
					<label for="last_name" class="sr-only">Last name
					</label>
					<input type="text" name="last_name" id="last_name" placeholder="Last name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->Last_name }}">

					<span class="text-danger error-text last_name_error"></span>	

				</div>


				<div class="mb-4">
					<label for="username" class="sr-only">Username
					</label>
					<input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->username }}">

					<span class="text-danger error-text username_error"></span>	

				</div>

				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ Auth::user()->email}}">
				 

					<span class="text-danger error-text email_error"></span>



				</div>


				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">Update</button>
				</div>

			</form>	
		</div>
		

	</div>
		<!--	<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg mt-8">
			<form action="" method="post">
				@csrf
				
				<div class="mb-4">
					<label for="password" class="sr-only">Password
					</label>
					<input type="password" name="o_password" id="o_password" placeholder="Current password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('password')}}">

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				

				<div class="mb-4">
					<label for="password" class="sr-only">New Password
					</label>
					<input type="password" name="n_password" id="n_password" placeholder="Enter new password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('password')}}">

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="password_confirmation" class="sr-only">Repeat Password 
					</label>
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

					@error('password_confirmation')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Change Password</button>
				</div>

			</form>	
		</div>-->
		

	</div>
		</div>
	</div>


	</div>


	</div>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection