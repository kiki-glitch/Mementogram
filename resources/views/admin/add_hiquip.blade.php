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

	<div class="flex-1 p-10  font-bold" id="app">
		

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-4">

			@if(session('success'))

        <div class="bg-green-200 rounded py-2 mb-2 text-green-500 mt-2 text-sm">
              
          {{session('success')}}
        </div>
        @endif
			<div class="mb-2">
				Create New Product
			</div>

			<form action="{{ route('add.product')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="mb-4">
				<input type="file" name="product_img">
				@error('product_img')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror

				</div>
				<div class="mb-4">
					<label for="product_name" class="sr-only">Product Name
					</label>
					<input type="text" name="product_name" id="name" placeholder="Product name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('product_name')}}">

					@error('product_name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="category" class="sr-only">Category
					</label>
					<select name="category" id="category" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
						<option selected disabled>Select Category</option>
						<option value="Visuals">Visuals</option>
						<option value="Lighting">Lighting</option>
						<option value="Sound">Sound</option>
					</select>

					@error('category')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="description" class="sr-only">Description
					</label>
					<textarea name="description" id="description" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('description')}}"></textarea>

					@error('description')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>

				<div class="mb-4">
					<label for="price" class="sr-only">Price
					</label>
					<input type="number" name="price" id="price" placeholder="Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('price')}}">

					@error('price')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	

				</div>


				<div>
					<button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Product</button>
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