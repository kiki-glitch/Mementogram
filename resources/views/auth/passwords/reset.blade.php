@extends ('layout.nav')

@section('content')
	<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg">
			<form action="{{ route('password.update') }}" method="post">
				@csrf
			
				<input type="hidden" name="token" value="{{ $token }}">
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
					<label for="password" class="sr-only">New Password
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
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Reset Password</button>
				</div>

			</form>	
		</div>
		

	</div>

	<div class="flex justify-center mt-10 text-gray-700">
			
			Copyright &copy; 2021 &mdash; Memontogram

		</div>
@endsection