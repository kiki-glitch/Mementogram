@extends ('layout.nav')

@section('content')
<div>
	<div class="w-64 h-screen bg-gray-900 rounded-md overflow-y-scroll">
		<div class="pc-6 pt-8">
		<div class="flex items-center justify-between">
			<a href="#" class="bg-blue-600 p-1.5 rounded flex items-center justify-center">Mementogram</a>
			
			<button class="flex items-center justify-center p-8.5 rounded bg-gray-800"><i class="fas fa-arrow-left"></i></button>
		</div>	

	</div>
	<div class="px-6 pt-4">
		<div class="relative">
		<div class="absolute inset-y-0 left-0 flex items-center">
			<i class="fas fa-search w-4 h-4 stroke-current text-gray-500"></i>
		</div>
		<input type="text" name="" placeholder="search" class="w-full rounded px-4 py-2.5 text-sm font-light bg-gray-800 text-gray-400 placeholder-gray-500" >


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
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-800">Dashboard</a>
			</li>
			<li class="">
				<div class="relative text-gray-500 hover:text-white flex justify-between">
					<div class="flex items-center w-full">
						<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
						<i class="fas fa-user w-5 h-5 stroke-current"></i>
						</div>
						<a href="#" class="inline-block w-full pl-8 pr-4 py-2  rounded text-xs ">User</a>
					</div>
				<button class="absolute right-0 p-1 flex items-center" tabindex="-1">
					<i class="fas fa-caret-down w-5 h-5 stroke-current"></i></button>
				</div>
				<div class="pt-2 pl-4 ">
					<ul class="flex flex-col pl-2 text-gray-500 border-l border-gray-700">
						<li><a href="" class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-800 hover:text-white">User View</a> </li>
						<li class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-800 hover:text-white"><a href="">User View</a></li>
						<li class="inline-block w-full px-4 py-2 text-xs rounded hover:bg-gray-800 hover:text-white"><a href="">User View</a></li>
						
					</ul>
				</div>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-user-circle h-5 stroke-current"></i></div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2  rounded text-xs hover:bg-gray-800">Profile</a>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-lock w-5 h-5 stroke-current"></i></div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Password</a>
			</li>
			<li class="relative text-gray-500 hover:text-white">
				<div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
					<i class="fas fa-user-cog w-5 h-5 stroke-current"></i>
				</div>
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2  rounded text-xs hover:bg-gray-800">Settings</a>
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
					<a href="#" class="inline-block w-full pl-8 pr-4 py-2 rounded text-xs hover:bg-gray-800">Messages</a>
			</li>
			
		</ul>
	</div>

	<div class="px-6 pt-8 ">
		
	</div>

	<div class="pl-6 pr-4 py-4 flex items-center justify-between" style="background-color: #232529;">
		<div class="flex items-center">
			<div class="relative w-8 h-8 rounded-full before:absolute before:w-2 before:h-2 before:bg-green-500 before:rounded-full before:right-0 before:bottom-0 before:ring-1 before:ring-white ">
				<img src="/upload/avatars/1627377317.jpg" class="rounded-full">
			</div>
			<div class="flex flex-col pl-3">
				<div class="text-sm text-gray-50">
					Alex Kariuki
				</div>
				<span class="text-xs text-gray-50 font-light tracking-tight" style="color: #acacb8;">alex.wamai@strathmore.edu</span>
			</div>
		</div>	
		<button class="text-gray-400 bg-gray-700 rounded">
			<i class="fas fa-caret-down w-5 h-5 stroke-current"></i>
		</button>
	</div>
	
	</div>

</div>
@endsection