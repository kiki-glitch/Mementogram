@extends ('layout.nav')

@section('content')

	
	<section>
		
		<div class="text-container">
			<p>Hello,</p>
			<p>I am {{ $users->username }}</p>
			<p>I am a Social Content Creator</p>
			<button class="follow-btn">Follow me</button>
			<button class="contact-btn"><a href="/contact/{{$users->id}}/">Contact me</a></button>
		</div>

	<!--model----->

	<img src="/upload/avatars/{{$users->avatar}}" class="model" alt="model">


	</section>

	<div class="about-container">
		<!--image--->

		<img src="/upload/avatars/{{$users->avatar}}">

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
	<div class="holdingcontainer">
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
		
	
	@foreach($portfolios as $portfolio)
	<div class="holdingcontainer">
		
		<div class="internalcontainerL">
			<img src="/upload/portfolios/{{ $portfolio->media }}" width="300px" height="168px">

			{{ $portfolio->description }}

			{{ $portfolio->created_at->diffForHumans() }}
			
		
	</div>
	@endforeach
		
	</div>
	</div>

@endsection