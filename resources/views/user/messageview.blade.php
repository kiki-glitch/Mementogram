@extends ('layout.nav')

@section('content')

<div class="relative min-h-screen flex">

@include('layout.sidebarOption2')		

	<div class="flex-1 p-10 font-bold">

		@if($messages->count() > 0 )
	<div class="view_main">
			<div class="view_wrap list-view" style="display: block;">
				@foreach($messages as $message)
				<div class="view_item">
					<div class="vi_left">
						<img src="/upload/messageicon.png" alt="portfolio">	
					</div>
					<div class="vi_right">
						<p class="font-sans text-base antialised font-normal"><b>Sender:</b> {{ $message['Sender_name'] }}</p>
						<p class="font-sans text-base antialised font-normal"><b>Email:</b> {{ $message['sender_email'] }}</p>
						<p class="font-sans text-base antialised font-normal"><b>Subject:</b> {{ $message['subject'] }}</p>
						<p class="font-sans text-base antialised font-normal"><b>Phone Number:</b> {{ $message['phone_number'] }}</p>
						<p class="font-sans text-base antialised font-normal"><b>Sent:</b><span class="text-gray-500 italic">{{ $message->created_at->diffForHumans() }}</span> to your provided email</p>
					</div>
				
				</div>
				@endforeach	
	
			
				</div>
			</div>	
		@else
			<div class="">
				No Messages Received
			</div>
		@endif
			</div>
			
</div>

@endsection