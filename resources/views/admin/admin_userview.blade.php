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
      <a href="{{ route('portfolios.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400"> Portfolios View</a>
      <a href="{{ route('usersocials.view')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">User Socials View</a>
      <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Hiquip</a>
      <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-400">Portfolios</a>
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

       <div class="mb-2">
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
                Role
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
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
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
              <td class="px-6 py-4 
              whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	User
                </div>
                
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
                <a href="{{ "/admin/delete/password/user/".$user['id'] }}" onclick="return confirm('Are You Sure You want to Delete User?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
		@else

		<div class="mt-6 text-center">
			No posts
		</div>
		@endif
	

      


      <div class="text-center mt-10">

       Disabled Users

        

      </div>

      


      @if($trashes->count() > 0)

    <div class="flex flex-col mt-10 ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
        <table class="min-w-full divide-y divide-gray-200 ">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                User ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               First name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Last Name
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Username
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Profile Image
              </th>
               
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Industry
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Restore User</span>
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
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $user['id'] }}
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
               {{ $user['First_name'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $user['Last_name'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $user['username'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 
              whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $user['email'] }}
                </div>
                
              </td>
          
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $user['avatar'] }}
                </div>
                
              </td>
              
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
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection