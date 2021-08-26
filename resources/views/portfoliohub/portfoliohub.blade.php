@extends ('layout.nav')

@section('content')

<div class="body">
<div class="wrapper">
	<div class="links">
		<ul>
			<li class="li-list active" data-view="list-view"><i class="fas fa-th-list"></i>List View</li>
			<li class="li-grid" data-view="grid-view"><i class="fas fa-th-large"></i>Grid View</li>
		</ul>
	</div>

	<div class="view_main">
		<div class="view_wrap list-view" style="display: block;">
			@foreach($users as $user)
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/avatars/{{$user['avatar']}}" alt="portfolio">	
				</div>
				<div class="vi_right">
					<a href="/portfoliohub/view/user/{{ $user['id'] }}/" class="title">{{$user['username']}}</p></a>
					<p class="content">{{$user['industry']}}</p>
					<p class="content">{{$user['about_me']}}</p>
					<div class="btn">View More</div>
				</div>
					
			</div>
			@endforeach
		</div>
		<!--<div class="view_wrap grid-view" style="display: none;">
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div><div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
			<div class="view_item">
				<div class="vi_left">
					<img src="/upload/portfolios/1627905191.jpg" alt="portfolio">	
				</div>
				<div class="vi_right">
					<p class="title">Alex Kariuki</p>
					<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Non arcu risus quis varius quam. Aliquam id diam maecenas ultricies mi. Mattis rhoncus urna neque viverra. </p>
					<div class="btn">View More</div>
				</div>
			</div>
		</div>-->
	</div>
</div>
</div>


@endsection