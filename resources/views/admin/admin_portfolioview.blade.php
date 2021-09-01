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

   		<div class="text-center mb-3">

   			Portfolios

      </div>

   		@if($portfolios->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Portfolio ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               User ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Media's Path
              </th>
               
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Description
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Created at
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Updated at
              </th>
               
              
               @if($portfolios['deleted_at'] == null)
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
          </thead>

          @foreach($portfolios as $portfolio)
          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $portfolio['id'] }}
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
               {{ $portfolio['user_id'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $portfolio['media'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $portfolio['description'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 
              whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $portfolio['created_at'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $portfolio['updated_at'] }}
                </div>
                
              </td>
              
              @if($portfolio['deleted_at'] == null)
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/delete/portfilio/user/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Delete Users Portfolio?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
              @else
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/restore/portfolio/user/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Restore Deleted SocialLink?')"class="text-green-300 hover:text-green-600">Restore</a>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/permanent/delete/portfolio/user/".$portfolio['id'] }}" onclick="return confirm('Are You Sure You want to Permanently Delete User?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
              @endif
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
          {{ $portfolios->links()}}
      </div>
    </div>
  </div>
</div>
		@else

		<div class="mt-6 text-center">
			No posts
		</div>
		@endif
	</div>

			
		

	
	
		<!--<div>
			No social links found
		</div>-->
	


	</div>


	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection