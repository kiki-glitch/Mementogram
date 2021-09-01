@extends ('layout.nav')

@section('content')

	
	<section>
		
		<div class="text-container">
			<p>Hello,</p>
			<p>I am {{ $users->username }}</p>
			<p>I am a Social Content Creator</p>
			@foreach($socials as $social)
			<p>{{$social->social_media}} - <a href="{{ $social['URL']}}" class="text-blue-500 underline hover:text-blue-300">{{$social['URL']}}</a></p>
			@endforeach
			<button class="follow-btn">Follow me</button>
			<button class="contact-btn"><a href="/contact/{{$users->id}}/">Contact me</a></button>
		</div>

	<!--model----->

	<img src="/upload/avatars/{{$users->avatar}}" class="model" alt="model">


	</section>

	<div class="about-container">
		<!--image--->

		<img src="/upload/avatars/{{$users->avatar}}" class="rounded ">

		<!--about text-->
		<div class="about-text">
			<p>About me</p>
			<p>Social Content Creator</p>
			<h3>{{ $users->industry }}</h3>
			<h4>{{ $users->location }}</h4>
			<p>{{ $users->about_me }}</p>
			<p>If you want us to do a collaboration or want to enquire for any information contact me, I will respond as soon as possible</p>

			<button><a href="/contact/{{$users->id}}/">Contact me</a></button>
		</div>
	</div>
	
<!--
	<div class="container">
		<div class="gallery">
			<img src="/upload/portfolios/1628855235.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.	
			</div>
			<div class="time">4:20</div>
		</div>

		<div class="gallery">
			<img src="/upload/portfolios/1628656791.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.	
			</div>
			<div class="time">4:20</div>
		</div>

		<div class="gallery">
			<img src="/upload/portfolios/1627904938.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
				<p>Time:4.20</p>	
			</div>
		</div>

		<div class="gallery">
			<img src="/upload/portfolios/1628855235.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.	
			</div>
			<div class="time">4:20</div>
		</div>
		<div class="gallery">
			<img src="/upload/portfolios/1627904938.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
				<p>Time:4.20</p>	
			</div>
		</div>

		<div class="gallery">
			<img src="/upload/portfolios/1628855235.jpg">
			<div class="desc">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.	
			</div>
			<div class="time">4:20</div>
		</div>
	</div>-->
	<!--<div class="holdingcontainer">
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>
		<div class="internalcontainerL">
			<img src="/upload/portfolios/1628855235.jpg">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra.
		</div>-->
		
	
	
	<div class="holdingcontainer">
	@foreach($portfolios as $portfolio)	
		<div class="internalcontainerL">
			<img src="/upload/portfolios/{{ $portfolio->media }}" width="300px" height="168px">

			<div>{{ $portfolio->description }}</div>

			<div class="text-gray-400 font_base antialised font-light italic">{{ $portfolio->created_at->diffForHumans() }}</div>
			
		
	</div>
	@endforeach
		
	</div>
	 <!-- <div class="container mx-auto px-4"> 
	  	 <section class="pt-8 px-4">
        <div class="flex flex-wrap -mx-4">
         @foreach($portfolios as $portfolio)
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="/upload/portfolios/{{ $portfolio->media}}" alt="">
          	<p class="font-sans md:font-serif text-base antialiased font-light">{{ $portfolio->description }}</p>
          	<span class="text-sm text-gray-600 ">{{ $portfolio->created_at->diffForHumans() }}</span>
          </div>
          @endforeach-->
          <!--<div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>
          <div class="md:w-1/3 px-4 mb-8"><img class="rounded shadow-md" src="https://source.unsplash.com/random/1280x720" alt=""></div>-->
        </div>
      </section>
	  </div>
	</div>

@endsection