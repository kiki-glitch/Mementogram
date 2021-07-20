@extends('layout.nav')

@section('content')

<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg">
			<form action="{{ route('login') }}" method="post">
				@csrf

				@if (session('status'))

				<div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">	
				{{ session('status')}}
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
					<label for="password" class="sr-only">Password
					</label>
					<input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 borer-2 w-full p-4 rounded-lg" value="">

					

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>
				<div class="mb-4">
					<input type="checkbox" name="remember" id="remember" class="mr-2">
					<label for="remember">Remember me</label>

				</div >

				<div class="mb-4">
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
				</div>


				<div class="px-20 mb-4 text-blue-400 ">
					<a href="{{ route('request') }}" class="hover:underline">Forgot password</a>

				</div>

				<div class="mb-4 text-center">
					
					Don't have an account? <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Create one</a>
				</div>

			</form>	
		</div>
		

	</div>

@endsection