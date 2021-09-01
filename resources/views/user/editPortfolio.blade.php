@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	<!--sidebar-->
	@include('layout.sidebarOption2')	
	<!--content-->

	<div class="flex-1 p-10  font-bold">
		
		<!--<div class="flex items-center justifycenter pt-10 flex-col mb-4">
		
		
			<div class="flex items-center justifycenter pt-5 flex-row">
			
		
		

	</div>-->

		


	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			<div class="mb-2">
				Your Portfolio
			</div>

			<form action="{{ route('portfolio.update') }}" method="post" enctype="multipart/form-data">
				@csrf

				@if(session('success2'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('success2')}}

				</div>
				@endif

					<input type="hidden" name="id" value="{{ $portfolios['id']}}">
					<input type="hidden" name="user_id" value="{{ $portfolios['user_id']}}">
				

					<img src="/upload/portfolios/{{ $portfolios['media'] }}" class="w-4/12 h-4/12">

					<div class="mb-4">
					<label for="description" class="sr-only">Image/Video Description
					</label>
					<input type="text" name="description" id="description" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $portfolios['description'] }}">	

				</div>

					@error('description')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full mb-3 ">Update</button>
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