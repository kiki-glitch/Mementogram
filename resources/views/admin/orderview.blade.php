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
      <a href="" class="bg-blue-500 text-white hover:bg-blue-600 rounded-lg px-6 py-2 m-2 float-left ">Orders</a>
      </div>
      
  	
   		<div class="text-center mb-3">

   			User Orders
      </div>


   		@if($orders->count() > 0)

		<div class="flex flex-col ">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Order ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Product ID
              </th>
            
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Status
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Grand Total
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Item Count
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Payment method
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Location
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              is_paid
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              is_returned
              </th>
              <!--<th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Reset Password</span>
              </th>-->
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Action</span>

              </th>
              
            </tr>
          </thead>

          @foreach($orders as $order)
          <tbody class="bg-white divide-y divide-gray-200">	
            <tr>
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $order['id'] }}
              </td>        
            
            
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $order['user_id'] }}
                </div>
                
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                	{{ $order['status'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['grand_total'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['item_count'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['payment_method'] }}
                </div>
                
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img src="/upload/avatars/default.png" class="h-10 w-10 rounded-full" alt="user avatar">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $order['name'] }} 
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $order['email'] }}
                    </div>
                     <div class="text-sm text-gray-500">
                      {{ $order['phone_number'] }}
                    </div>
                  </div>
                </div>
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['location'] }}
                </div>
                
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['is_paid'] }}
                </div>
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ $order['is_returned'] }}
                </div>
                
              </td>

             <!-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ $user['First_name'] }}
                </span>
              </td>-->
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/edit/order/".$order['id'] }}" class="text-blue-500 hover:text-blue-600">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ "/admin/delete/order/".$order['id'] }}" onclick="return confirm('Are You Sure You want to Delete Order?')" class="text-red-500 hover:text-red-600">Delete</a>
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
          @endforeach
        </table>
        {{ $orders->links()}}
      </div>
    </div>
  </div>
</div>
		@else

		<div class="mt-6 text-center">
			No Order Entries
		</div>
		@endif
		
			
	</div>
		
		

	</div>
		
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 
	 

@endsection