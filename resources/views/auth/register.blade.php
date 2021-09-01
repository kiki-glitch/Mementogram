@extends ('layout.nav')

@section('content')
	<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg">
			<form action="{{ route('register') }}" method="post">
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
					<label for="role_id" class="sr-only">Role
					</label>
					<select name="role_id" id="role_id" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
						<option  selected disabled >Register as </option>
						<option value="user">Content-Creator User</option>
						<option value="brand">Brand/Company</option>
						
					</select>

					@error('role_id')
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

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
				</div>

			</form>	
		</div>
		

	</div>
@endsection