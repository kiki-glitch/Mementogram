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

		 @if(session('msg'))

        <div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
              
          {{session('msg')}}
        </div>
        @endif

	
      <div class="mb-5">
      <a href="{{ route('add_user')}}" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg px-6 py-2 m-2 float-left ">Add User</a>
      </div>
      
  	
   		<div class="text-center mb-3">

   			Users
      </div>


   		@if($users->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                User ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               Name
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Industry
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Reset Password</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
            </tr>
          </thead>

          @foreach($users as $user)
          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user['id'] }}
              </td>        
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img src="/upload/avatars/{{$user['avatar']}}" class="h-10 w-10 rounded-full" alt="user avatar">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $user['First_name'] }} {{ $user['Last_name'] }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $user['email'] }}
                    </div>
                  </div>
                </div>
              </td>
             <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ $user['First_name'] }}
                </span>
              </td>--->

              
                
              </td>
            
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $user['location'] }}
                </div>
                
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $user['industry'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/reset/password/user/".$user['id'] }}" class="text-green-300 hover:text-green-600">Reset Password</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/edit/user/".$user['id'] }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/delete/password/user/".$user['id'] }}" onclick="return confirm('Are You Sure You want to Delete User?')" class="text-red-500 hover:text-red-600">Disable User</a>
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
        {{ $users->links()}}
      </div>
    </div>
  </div>
</div>
		@else

		<div class="mt-6 text-center">
			No posts
		</div>
		@endif
		

		<div class="text-center mt-10 mb-3">

   			Disabled Users
      </div>


   		@if($trashes->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                User ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               Name
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Industry
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Reset Password</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
            </tr>
          </thead>

          @foreach($trashes as $user)
          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user['id'] }}
              </td>        
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img src="/upload/avatars/{{$user['avatar']}}" class="h-10 w-10 rounded-full" alt="user avatar">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $user['First_name'] }} {{ $user['Last_name'] }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $user['email'] }}
                    </div>
                  </div>
                </div>
              </td>
             <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ $user['First_name'] }}
                </span>
              </td>--->
             
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $user['location'] }}
                </div>
                
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $user['industry'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/restore/password/user/".$user['id'] }}" onclick="return confirm('Are You Sure You want to Restore Deleted User?')"class="text-green-300 hover:text-green-600">Restore User</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/edit/password/user/".$user['id'] }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/permanent/delete/password/user/".$user['id'] }}" onclick="return confirm('Are You Sure You want to Permanently Delete User?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
        {{ $trashes->links()}}
      </div>
    </div>
  </div>
</div>
		@else

    <div class="mt-6 text-center">
      No Users Disabled
    </div>
    @endif

		
		

	</div>
		
		

	</div>
		
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 
	 

@endsection