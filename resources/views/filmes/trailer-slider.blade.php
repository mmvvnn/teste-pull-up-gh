<div class="trailers full-width">
	<div class="row ipad-width">
		<div class="col-md-9 col-sm-12 col-xs-12">
			<div class="title-hd">
				<h2>TRAILERS POPULARES</h2>
				<a href="{{ route('filmes.filmes') }}" class="viewall">VER TODOS <i class="ion-ios-arrow-right"></i></a>
			</div>
			<div class="videos">
				 <div class="slider-for-2 video-ft">
					@foreach ($movieTrailers as $movie)
						<div>
							<iframe class="item-video" src="" data-src="https://www.youtube.com/embed/{{ $movie['video'] }}"></iframe>
						</div>
					@endforeach
				 </div>
				 <div class="slider-nav-2 thumb-ft">
					@foreach ($movieTrailers as $movie)
						<div class="item">
							<div class="trailer-img">
								<img src="https://image.tmdb.org/t/p/w154{{ $movie['image'] }}"  alt="{{ $movie['title'] }}" width="4096" height="2737">
							</div>
							<div class="trailer-infor">
								<h4 class="desc">{{ $movie['title'] }}</h4>
								<p>{{ $movie['genres'] }}</p>
							</div>
						</div>
					@endforeach
				 </div>
			 </div>
		 </div>
		 <!-- Popular Actors -->
		 @include('components.popular-actors')
		<!-- End Popular Actors -->
	 </div>
</div>