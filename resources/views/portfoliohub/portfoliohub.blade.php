@extends ('layout.nav')

@section('content')

<div class="relative min-h-screen flex">

	<!--sidebar-->

<div class="w-64  bg-gray-900 h-screen sticky top-0 rounded-md overflow-y-scroll">
		<div class="pc-6 pt-8">
		<div class="flex items-center justify-between">
			<a href="#" class="pb-4 text-lg font-semibold tracking-widest text-gray-500 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Mementogram</a>
			
			<button class="flex items-center justify-center p-8.5 rounded bg-gray-800"><i class="fas fa-arrow-left"></i></button>
		</div>	

	</div>
	<div class="px-6 pt-4">
		<div class="relative">


		<form class="" action="{{ url('/search') }}" method="get">
		@csrf
		<input type="search" name="query" placeholder="Search User" class="w-full rounded px-4 py-2.5 text-sm font-light bg-gray-800 text-gray-400 placeholder-gray-500" value="{{ request()->query('search')}}">
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
			
			
			<li class="relative text-gray-500 hover:text-white focus-within:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-columns w-5 h-5 stroke-current"></i></div>
					<a href="{{ route('dashboard') }}" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-800">Dashboard</a>
			</li>
			<li class="relative text-gray-500 hover:text-white focus-within:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-camera w-5 h-5 stroke-current"></i></div>
					<a href="{{ route('hiquip') }}" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-800">Hiquip</a>
			</li>
						
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
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Settings</a>
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
	
	@guest
		<div class="pl-6 pr-4 py-4 flex items-center justify-between" style="background-color: #232529;">
		<div class="flex items-center">
			<div class="relative w-8 h-8 rounded-full before:absolute before:w-2 before:h-2 before:bg-green-500 before:rounded-full before:right-0 before:bottom-0 before:ring-1 before:ring-white ">
				<img src="/upload/avatars/default.png" class="rounded-full">
			</div>
			<div class="flex flex-col pl-3">
				<div class="text-sm text-gray-50">
					John Doe
				</div>
				<span class="text-xs text-gray-50 font-light tracking-tight" style="color: #acacb8;">johndoe@gmail.com</span>
			</div>
		</div>	
		<button class="text-gray-400 bg-gray-700 rounded">
			<i class="fas fa-caret-down w-5 h-5 stroke-current"></i>
		</button>
	</div>
	@endguest
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
			<!--<li class="li-list active" data-view="list-view"><i class="fas fa-th-list"></i>List View</li>
			<li class="li-grid" data-view="grid-view"><i class="fas fa-th-large"></i>Grid View</li>-->
		<li class="">
			All Users
		</li>

			
<div class="flex items-center justify-center">
  <div class=" relative inline-block text-left dropdown">
    <span class="rounded-md shadow-sm"
      ><button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" 
       type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
        <span>Industry</span>
        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button
    ></span>
    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
      <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
        <div class="px-4 py-3">         
          <p class="text-sm leading-5">Signed in as</p>
          @auth
          <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{auth()->user()->email}}</p>
          @endauth
          @guest
          <a href="{{ route('login') }}"class="text-sm font-medium leading-5 text-blue-500 hover:text-blue-300 truncate">Sign in with us</a>
          @endguest
        </div>
        <div class="py-1">
          <a href="{{ route('industry.sports')}}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Sports</a>
          <a href="{{ route('industry.clothes')}}" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Clothes</a>
          <a href="{{ route('industry.car')}}" tabindex="2" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem" >Cars</a></div>
        <div class="py-1">
          <a href="{{ route('industry.music')}}" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Music</a></div>
      </div>
    </div>
  </div>
</div>              

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
	<!--	<div class="view_wrap grid-view" style="display: none;">
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
			</div>-->
			
			
			
		
	</div>
</div>
</div>
</div>
</div>

@endsection