@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	<!--sidebar-->
	@include('layout.adminsidebar')
	<!--content-->

	<div class="flex-1 p-10  font-bold">
		
	

	<div class="flex justify-center">
		<div class="w-6/12 bg-white p-6 rounded-lg">

			<div class="mb-4 text-center font-bold">
					
					Reset Password

				</div>

			<form action="{{ route('userpasswordChange.update')}}" method="post">
				@csrf

				@if(session('msg'))

				<div class="bg-green-200 rounded py-2 mb-2  text-green-500 mt-2 text-sm">
							
					{{session('msg')}}
				</div>
				@endif


				<input type="hidden" name="id" value="{{ $users['id']}}">	
				

				<div class="mb-4">
					<label for="password" class="sr-only">New Password
					</label>
					<input type="password" name="password" id="password" placeholder="Enter new password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('password')}}">

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
@endsection

	

	 







