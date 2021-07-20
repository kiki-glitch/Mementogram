@extends('layout.nav')

@section('content')

	<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg">

			<div class="mb-4 text-center font-bold">
					
					Reset Password

				</div>

			<form action="{{ route('request') }}" method="post">
				@csrf

				@if (session('error'))

				<div class="bg-red-500 p-4 rounded-lg mb-6 text-red-600 text-center">	
				{{ session('error')}}
				</div>
				@endif

				@if (session('success'))

				<div class="bg-red-500 p-4 rounded-lg mb-6 text-green-400 text-center">	
				{{ session('success')}}
				</div>
				@endif


				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 borer-2 w-full p-4 rounded-lg" value="{{ old('email')}}">

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div class="mb-4">
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Send Password Reset Link</button>
				</div>

			</form>

		</div>

		
	</div>

	<div class="flex justify-center mt-10 text-gray-700">
			
			Copyright &copy; 2021 &mdash; Memontogram

		</div>
@endsection