@extends ('layout.nav')

@section('content')

<div class="relative min-h-screen flex">

	<!--sidebar-->

<div class="w-64  bg-gray-900 h-screen sticky top-0 rounded-md overflow-y-scroll">
		<div class="pc-6 pt-8">
		<div class="flex items-center justify-between">
			<a href="#" class="bg-blue-600 p-1.5 rounded flex items-center justify-center">Mementogram</a>
			
			<button class="flex items-center justify-center p-8.5 rounded bg-gray-800"><i class="fas fa-arrow-left"></i></button>
		</div>	

	</div>
	<div class="px-6 pt-4">
		<div class="relative">


		<form class="" action="{{ url('/search') }}" type="get">
		@csrf
		<input type="search" name="query" placeholder="Search" class="w-full rounded px-4 py-2.5 text-sm font-light bg-gray-800 text-gray-400 placeholder-gray-500" >
		<div class="absolute inset-y-0 right-0 flex items-center">
			
			<button type="submit"><i class="fas fa-search w-4 h-4 stroke-current text-gray-500"></i></button>

		</div>

	</div>
	</div>

	<div class="px-6 pt-4 ">
		<hr class="border-gray-700">
	</div>
	<div class="px-6 pt-4">

		<ul class="flex flex-col space-y-2 ">
			<li class="relative text-gray-500  focus-within:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-location-arrow w-5 h-5 stroke-current"></i></div>
					<p class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs focus:outline-none ">Location</p>

			</li>
			<div class="relative">


		<form class="" action="{{ url('/search/user/location/') }}" type="get">
		@csrf
		<input type="search" name="location_query" placeholder="Search by Location" class="w-full rounded px-4 py-2.5 text-sm font-light bg-gray-800 text-gray-400 placeholder-gray-500" >
		<div class="absolute inset-y-0 right-0 flex items-center">
			
			<button type="submit"><i class="fas fa-search w-4 h-4 stroke-current text-gray-500"></i></button>

		</div>

	</div>
			<li class="relative text-gray-500  focus-within:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-industry w-5 h-5 stroke-current"></i></div>
					<p class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs focus:outline-none ">Industry</p>

			</li>
			<div class="relative">


		<form class="" action="{{ url('/search/user/industry/') }}" type="get">
		@csrf
		<input type="search" name="industry_query" placeholder="Search by Industry" class="w-full rounded px-4 py-2.5 text-sm font-light bg-gray-800 text-gray-400 placeholder-gray-500" >
		<div class="absolute inset-y-0 right-0 flex items-center">
			
			<button type="submit"><i class="fas fa-search w-4 h-4 stroke-current text-gray-500"></i></button>

		</div>

	</div>
			
						
		</ul>
	</div>

	<div class="px-6 pt-8 pb-2">
		<hr class="border-gray-700 ">
	</div>

	<div class="px-6 pt-4">
		<ul>
			<li class="relative text-gray-500 hover:text-white ">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-bell w-5 h-5 stroke-current"></i>
				</div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Notifications</a>
			</li>
			<li class="relative text-gray-500 hover:text-white ">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-columns w-5 h-5 stroke-current"></i></div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Messages</a>
			</li>
			
		</ul>
	</div>

	<div class="px-6 pt-40 ">
		
	</div>

	@auth
	<div class="pl-6 pr-4 py-4 flex items-center justify-between" style="background-color: #232529;">
		<div class="flex items-center">
			<div class="relative w-8 h-8 rounded-full before:absolute before:w-2 before:h-2 before:bg-green-500 before:rounded-full before:right-0 before:bottom-0 before:ring-1 before:ring-white ">
				<img src="/upload/avatars/{{auth()->user()->avatar}}" class="rounded-full">
			</div>
			<div class="flex flex-col pl-3">
				<div class="text-sm text-gray-50">
					{{auth()->user()->First_name}} {{auth()->user()->Last_name}}
				</div>
				<span class="text-xs text-gray-50 font-light tracking-tight" style="color: #acacb8;">{{auth()->user()->email}}</span>
			</div>
		</div>	
		<button class="text-gray-400 bg-gray-700 rounded">
			<i class="fas fa-caret-down w-5 h-5 stroke-current"></i>
		</button>
	</div>
	@endauth
	</div>
	
	<div class="flex-1 p-10 font-bold">

	<div class="body">
		@if(session('msg'))

		<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" style="background-color:  #ffe0b2; color: #f57c00;">
  
  		<p>{{session('msg')}}</p>
		</div>
				
				
		@endif
	<div class="wrapper">
	<div class="links">
		<ul>
			<li class="li-list active" data-view="list-view"><i class="fas fa-th-list"></i>List View</li>
			<li class="li-grid" data-view="grid-view"><i class="fas fa-th-large"></i>Grid View</li>
		</ul>
		
	</div>

	<div class="view_main">
		<div class="view_wrap list-view" style="display: block;">
			@foreach($users as $user)
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/avatars/{{$user['avatar']}}" alt="portfolio">	
				</div>
				<div class="vi_right">
					<a href="/portfoliohub/view/user/{{ $user['id'] }}/" class="title">{{$user['username']}}</p></a>
					<p class="content">{{$user['industry']}}</p>
					<p class="content">{{$user['about_me']}}</p>
					<div class="btn">View More</div>
				</div>
					
			</div>
			@endforeach
		</div>
		<div class="view_wrap grid-view" style="display: none;">
			@foreach($users as $user)
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/avatars/{{$user['avatar']}}" alt="portfolio">	
				</div>
				<div class="vi_right">
					<a href="/portfoliohub/view/user/{{ $user['id'] }}/" class="title">{{$user['username']}}</p></a>
					<p class="content">{{$user['industry']}}</p>
					<p class="content">{{$user['about_me']}}</p>
					<div class="btn">View More</div>
				</div>
					
			</div>

			@endforeach
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			
			
			
		
	</div>
</div>
</div>
</div>
</div>

@endsection