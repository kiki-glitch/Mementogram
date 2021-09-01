@extends ('layout.nav')

@section('content')

	
	
	<!--<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			Dashboard
		</div>
	</div>-->



	<div class="relative min-h-screen flex">

	@include('layout.adminsidebar')

	<!--content-->

	<div class="flex-1 p-10  font-bold" id="app">
		

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			@if(session('msg'))

        <div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
              
          {{session('msg')}}
        </div>
        @endif
			<div class="mb-2">
				Edit Order
			</div>

			<form action="{{ route('order.update')}}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ $orders->id }}">
				

				<div class="mb-4">
					<label for="status" class="sr-only">Status
					</label>
					<select name="status" id="status" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
						<option selected disabled>Select Status</option>
						<option value="pending">Pending</option>
						<option value="processing">Processing</option>
						<option value="completed">Completed</option>
						<option value="decline">Declined</option>
						
					</select>

					@error('status')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="payment_method" class="sr-only">Payment Method
					</label>
					<select name="payment_method" id="payment_method" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
						<option selected disabled>Select Payment Method</option>
						<option value="cash">Cash</option>
						<option value="mpesa">Mpesa</option>
						
						
					</select>

					@error('payment_method')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>
				<div class="mt-4">
			  <span class="text-gray-700">Payment Confirmation</span>
			  <div class="mt-2">
			    <label class="inline-flex items-center">
			      <input type="radio" class="form-radio" name="is_paid" value="0">
			      <span class="ml-2">Not Paid</span>
			    </label>
			    <label class="inline-flex items-center ml-6">
			      <input type="radio" class="form-radio" name="is_paid" value="1">
			      <span class="ml-2">Paid</span>
			    </label>
			  </div>
			</div>
			@error('is_paid')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror
				<div class="mt-4">
			  <span class="text-gray-700">Returned Hiquip Confirmation</span>
			  <div class="mt-2">
			    <label class="inline-flex items-center">
			      <input type="radio" class="form-radio" name="is_returned" value="0">
			      <span class="ml-2">Not Returned</span>
			    </label>
			    <label class="inline-flex items-center ml-6">
			      <input type="radio" class="form-radio" name="is_returned" value="1">
			      <span class="ml-2">Returned</span>
			    </label>
			  </div>
			</div>
			@error('is_returned')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit Order</button>
				</div>

			</form>
		

	</div>

	</div>
		</div>
	</div>


	</div>


	</div>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script>
	 	const app = new Vue({
	 		el:'#app',
	 		data: {
	 			auto_generaate:true
	 		}
	 	});

	 </script>
	 

@endsection