@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	<!--sidebar-->
	@include ('layout.sidebarOption2')
	<!--content-->

	<!--<div class="flex-1 p-10  font-bold">-->
		
		<div clss="w-full min-h-screen bg-blue-50 p-6">
			<h1 class="font-bold text-xl text-center">
				Your Portfolio

				@if(session('msg'))
			<div class="flex justify-center bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm ">
							
					{{session('msg')}}

				</div>
		@endif
			</h1>

		<!---Portfolio view--->
		<!--<div class="flex">

		<div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">
			
			
				<img src="/upload/avatars/default.png" alt="" class=" h-20 ">

				<h2 class="text-center px-2 pb-5">Description<h2>

				<h2 class="bg-blue-500 text-white p-3 text-center">Time created</h2>

			
		</div>

	
		
		</div>-->
		@if($portfolios->count() > 0)
		<div class="portfolio_content">
			
	<div class="portfolio_container">
		
		@foreach($portfolios as $portfolio)
		<div class="card">	
			<div class="imgBx">
				<img src="/upload/portfolios/{{ $portfolio['media'] }}" alt="">
				
			</div>
		<div class="content">
			<div class="productName">
				<h3>{{ $portfolio['description'] }}</h3>
				<p>{{ $portfolio->created_at->diffForHumans() }}</p>
			</div>
			
			<div class="flex justify-between">
				@if($portfolio['deleted_at'] == null)
				<button class="bg-blue-500 text-blue-50 rounded-lg py-2 px-6 ">
					<a href="{{ "edit/".$portfolio['id'] }}">Edit</a>
				</button>
                 <button class="bg-red-500 text-blue-50 rounded-lg py-2 px-4 ">
					<a href="{{ "disable/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Disable Your Portfolio?')">Disable</a>
				</button>
				@else
				<button class="bg-green-500 text-blue-50 rounded-lg py-2 px-6 ">
					<a href="{{ "restore/".$portfolio['id'] }}"  >Restore</a>
				</button>
                 <button class="bg-red-500 text-blue-50 rounded-lg py-2 px-4 ">
					<a href="{{ "force_delete/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Delete?')">Delete</a>
				</button>
				@endif
			</div>
		</div>
		</div>
		@endforeach
	</div>

	@else

	<div class="mt-6 text-center">
			No posts
		</div>
		@endif
</div>
</div>
		
	
		

	
			
		</div>
		</div>

		
	


	
		

	

	</div>
		</div>
	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection