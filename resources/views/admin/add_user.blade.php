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
			<nav>
			<a href="{{ route('admin_user.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Users View</a>
			<a href="{{ route('portfolios.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">User Portfolio View</a>
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

	<div class="flex-1 p-10  font-bold" id="app">
		

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Create New User
			</div>

			<form action="{{ route('add.user')}}" method="post">
				@csrf
				<div class="mb-4">
					<label for="first_name" class="sr-only">First name
					</label>
					<input type="text" name="first_name" id="first_name" placeholder="First name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('first_name')}}">

					@error('first_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="last_name" class="sr-only">Last name
					</label>
					<input type="text" name="last_name" id="last_name" placeholder="Last name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('last_name')}}">

					@error('last_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div class="mb-4">
					<label for="username" class="sr-only">Username
					</label>
					<input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('username')}}">

					@error('username')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('email')}}">

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="password" class="sr-only">Password
					</label>
					<input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('password')}}">

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="password_confirmation" class="sr-only">Repeat Password 
					</label>
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repaeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

					@error('password_confirmation')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>
				<!--<div class="mt-2">
					    <div>
					      <label for="auto_generate" class="inline-flex items-center">
					        <input type="checkbox" class="form-checkbox" name="auto_generate"  v-model="auto_generate">
					        <span class="ml-2" >Auto Generate Password</span>
					      </label>
					    </div>
				</div>-->
				<div class="block">
					  <span class="text-gray-700">Role</span>
					  <div class="mt-2">

					  	@foreach($roles as $role)
					  	<input type="checkbox" class="form-checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}">
					  	<label class="inline-flex items-center" for="{{ $role->name }}">{{$role->display_name}}</label>
					  	@endforeach
					   <!-- <div>
					    	@foreach($roles as $role)
					      <label class="inline-flex items-center">
					        <input type="checkbox" class="form-checkbox" name="rolesSelected" value="{{ $role->id }}">
					        <span class="ml-2">{{ $role->display_name }}</span>
					      </label>
					      @endforeach
					    </div>-->
					    <!--<div>
					      <label class="inline-flex items-center">
					        <input type="checkbox" class="form-checkbox">
					        <span class="ml-2">User</span>
					      </label>
					    </div>-->
					    <!--<div>
					      <label class="inline-flex items-center">
					        <input type="checkbox" class="form-checkbox">
					        <span class="ml-2">Brand</span>
					      </label>
					    </div>
					  </div>-->
					</div>

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create User</button>
				</div>

			</form>
		

	</div>

	</div>
		</div>
	</div>


	</div>


	</div>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script>
	 	const app = new Vue({
	 		el:'#app',
	 		data: {
	 			auto_generaate:true
	 		}
	 	});

	 </script>
	 

@endsection