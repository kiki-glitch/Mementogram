@extends ('layout.nav')

@section('content')

<div class="antialised">
	
	<div class="flex w-full min-h-screen justify-center items-center">
		<div class="flex flex-col md:flex-row md:space-x-6 md:space-y-6 space-y-6 w-full max-w-4xl p-8 sm:p-12 rounded-xl shadow-lg text-white" style="background-color: #0097a7; overflow:hidden;">
		
		<div class="flex flex-col justify-between">

			@if(session('msg'))

				<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
					  
					  <p>{{session('msg')}}</p>
					</div>
				@endif
			<div>
				<h1 class="font-bold text-4xl tracking-wide">Contact </h1>
				<p class="pt-2 text-sm" style="color: #b2ebf2;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>
			</div>

			<div class="flex flex-col space-y-6 mt-6">
				<div class="inline-flex space-x-2 items-center">
			
				<i class="fas fa-phone  text-xl" style="color:#4db6ac;"></i>
			<span>+254 7345678304</span></div>
			<div class="inline-flex space-x-2 items-center">
			  
				<i class="fas fa-map-pin text-xl" style="color:#4db6ac;"></i>
			<span>Nairobi, CBD</span></div>
			<div class="inline-flex space-x-2 items-center">
				<i class="fas fa-envelope text-xl" style="color:#4db6ac;"></i>
			<span>mementogram@gmail.com</span>
		</div>
	</div>
			
		<div class="flex space-x-4 text-lg mt-6">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram-square"></i></i></a>
			<a href="#"><i class="fab fa-linkedin"></i></a>
		</div>
	</div>
		<div>
			<div class="relative">
				<div class="absolute z-0 w-40 h-40 rounded-full -right-28 -top-28" style="background-color:#26a69a;"></div>
				<div class="absolute z-0 w-40 h-40 rounded-full -left-28 -bottom-28" style="background-color:#26a69a;"></div>
			<div class="relative z-10 bg-white rounded-xl shadow-lg p-8 text-gray-600 md:w-80">

				<!--Contact form form-->

				<form action="{{ route('contact.save') }}" class="flex flex-col space-y-4" method="post">
					
					@csrf

					<input type="hidden" name="sender_id" value="{{Auth()->user()->id}}">
					 @error('sender_id')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
						@enderror
					<input type="hidden" name="recepient_id" value="{{$users->id}}">
					 @error('recepient_id')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
						@enderror
					<input type="hidden" name="recepient_email" value="{{$users->email}}">
					 @error('recepient_email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
						@enderror
					 <div>
					 	<label for="name" class="text-sm">Full name/Brand</label>
						<input type="text" name="name" placeholder="Your name" class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('name')}}">
					 
						 @error('name')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
						@enderror
					 </div>
						
					 <div>
					 	<label for="email" class="text-sm">Email Address</label>
					 	<input type="email" name="email" placeholder="Your email" class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('email')}}">
					 </div>
					 @error('email')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	
					 <div>
					 	<label for="phone" class="text-sm">Phone number</label>

					 	<input type="tel" name="phone" placeholder="Your Phone number" 
					 	 class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('phone')}}">
					 	 <small>Format: 07-2456-7890</small>
					 </div>
					 @error('phone')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	
					 <div>
					 	<label for="subject" class="text-sm">Subject</label>

					 	<input type="text" name="subject" placeholder="Subject" class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('subject')}}">
					 </div>
					 @error('subject')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	
					 <div>
					 	<label for="form_message" class="text-sm">Message</label>

					 	<textarea type="text" name="form_message" placeholder="Message" rows="4" class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 mt-2 outline-none focus:ring-2 focus:ring-blue-300" >
					 	</textarea> 
					 
					 @error('form_message')
						<div class="text-red-500 mt-2 text-sm">
							
							{{ $message }}
							
						</div>
					@enderror	
					</div>
					 <button type="submit" class="inline-block self-end text-white font-bold rounded-lg px-6 py-2 uppercase text-sm" style="background-color:#00b8d4;">Send Message</button>
				</form>
			</div>
		</div>
	</div>

</div>
</div>
</div>






@endsection

