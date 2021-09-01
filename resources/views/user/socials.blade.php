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


   		<div class="text-center mb-3">

   			Your Social Links

   		</div>

   		@if(session('msg'))

				<div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
							
					{{session('msg')}}

				</div>
				@endif

   			@if($socials->count() > 0)

		<div class="flex flex-col">
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
                User Id
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Social Media
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                URL
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>
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
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $social['user_id'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ $social['social_media'] }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
               {{ $social['URL'] }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "edit/".$social['id'] }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "delete/".$social['id'] }}" onclick="return confirm('Are You Sure You want to Delete?')" class="text-red-600 hover:text-indigo-900">Delete</a>
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
	</div>

			
		

	
	
		<!--<div>
			No social links found
		</div>-->
	


	</div>


	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 

@endsection