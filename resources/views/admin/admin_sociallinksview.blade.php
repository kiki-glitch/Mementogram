@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	<!--sidebar-->
	<div class="bg-gray-500 text-black-100 w-64 space-y-6 px-4">
	<!--logo-->
		

		<a href="" class="text-white flex items-center space-x-2">
			logo
		</a>

		<span class="text-2xl">Mementogram</span>

	<!--nav-->

		<nav>
			<a href="{{ route('admin_user.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Users View</a>
      <a href="{{ route('portfolios.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">User Portfolio View</a>
      <a href="{{ route('usersocials.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">User Socials View</a>
      <a href="}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Hiquip</a>
      <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Portfolio</a>
      <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Settings</a>
      <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button type="submit" class="block py-2.5 px-4" >Logout</button>
          </form>
		</nav>



	</div>		

	<!--content-->

	
		
		
			

   			<div class="flex-1 p-10  font-bold">

          @if(session('msg'))

        <div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
              
          {{session('msg')}}
        </div>
        @endif

   		<div class="text-center mb-3">

   			Social Links

      </div>

   		@if($socials->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Social Link ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               User ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Social Media
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                URL
              
              @if($socials['deleted_at'] == null)
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
              @else
               <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Restore</span>
              </th>
               <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Permanent Delete</span>
              </th>
              @endif
            </tr>
          </thead>

          @foreach($socials as $social)
          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $social['id'] }}
                    </div>
                    
                  </div>
                </div>
              </td>
             <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ $user['First_name'] }}
                </span>
              </td>--->

              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $social['user_id'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $social['social_media'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $social['URL'] }}
                </div>
                
              </td>
              
              
              </td>
              @if($social['deleted_at'] == null)
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/delete/sociallinks/user/".$social['id'] }}" onclick="return confirm('Are You Sure You want to Delete User's SocialLink?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
              @else
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/restore/sociallinks/user/".$social['id'] }}" onclick="return confirm('Are You Sure You want to Restore Deleted Portfolio?')"class="text-green-300 hover:text-green-600">Restore</a>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/permanent/delete/sociallinks/user/".$social['id'] }}" onclick="return confirm('Are You Sure You want to Permanently Delete User?')" class="text-red-500 hover:text-red-600">Permanent Delete</a>
              </td>
              @endif
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
        {{ $socials->links()}}
      </div>
    </div>
  </div>
</div>
		@else

		<div class="mt-6 text-center">
			No Social Links Available
		</div>
		@endif
	</div>

			
		

	
	
		<!--<div>
			No social links found
		</div>-->
	


	</div>


	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection