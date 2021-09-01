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

	<div class="flex-1 p-10  font-bold" id="app">
		
		<div class="flex items-center justifycenter pt-10 flex-col mb-4">
		
		<div class="w-6/12 bg-white  rounded-lg">
			<div class="flex items-center justifycenter pt-5 flex-row">
			

			<img src="/upload/avatars/{{$users['avatar']}}" class="rounded-full w-32 m-4">

			<h1 class="text-gray-800 font-semibold text-xl mt-5">{{ $users['username'] }}'s Profile</h1>
			
		
			</div>

			<div class="flex items-center justifycenter pt-5 flex-col">
				<form action="{{ route('admin.user.avatarupdate') }}" method="post" enctype="multipart/form-data" >

					<input type="hidden" name="id" value="{{ $users['id']}}">
					<label>Update Profile Image</label><br>
					<input type="file" name="avatar">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded  w-4/12 float-right">
					
				</form>


			</div>
		</div>
		
		

	</div>
	

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Edit User
			</div>

			<form action="{{ route('adminUser.update') }}" method="post">
				@csrf

				@if(session('success'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success')}}

				</div>
				@endif

				
				<input type="hidden" name="id" value="{{ $users['id']}}">
				
				<div class="mb-4">
					<label for="first_name" class="sr-only">First name
					</label>
					<input type="text" name="first_name" id="first_name" placeholder="First name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $users['First_name'] }}">

					@error('first_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="last_name" class="sr-only">Last name
					</label>
					<input type="text" name="last_name" id="last_name" placeholder="Last name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $users['Last_name'] }}">

					@error('last_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div class="mb-4">
					<label for="username" class="sr-only">Username
					</label>
					<input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $users['username'] }}">

					@error('username')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="email" class="sr-only">Email
					</label>
					<input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $users['email']}}">

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="location" class="sr-only">Location
					</label>
					<input type="text" name="location" id="location" placeholder="Your Location" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ $users['location'] }}">

				</div>
				
				@error('location')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div class="mb-4">
					<label for="industry" class="sr-only">Industry
					</label>
					<input type="text" name="industry" id="industry" placeholder="Your Industry e.g Sports,Music" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ $users['industry'] }}">

				</div>



				@error('industry')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror
				<div class="block">
					  <span class="text-gray-700">Role</span>
					  <div class="mt-2">

					  	@foreach($roles as $role)
					  	<input type="checkbox" class="form-checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}"
					  	  @if(in_array($role->id,$users->roles->pluck('id')->toArray())) checked @endif>

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
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">Update</button>
				</div>

			</form>	
		</div>

		</div>

			
	</div>
			<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-6">
			<div class="mb-2">
				Edit User's Description
			</div>

			<form action="{{ route('admin.user.user_description') }}" method="post" >
				@csrf

				@if(session('success'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success')}}

				</div>
				@endif

				<input type="hidden" name="id" value="{{ $users['id']}}">
				<div class="mb-4">
					<label for="about_me" class="sr-only">About me
					</label>
					<input type="text" name="about_me" id="about_me" placeholder="About me" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $users['about_me'] }}">

				</div>

				@error('about_me')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror
				
			
				<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full mb-3 ">Update</button>
				</div>

			</form>	
		</div>
		

	</div>
		</div>
	


	


	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 <script>
	 	const app = new Vue({
	 		el:'#app',
	 		data: {
	 			auto
	 		}
	 	});

	 </script>
	 

@endsection