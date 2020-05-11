<div class="latestnew full-width" id="latest-news">
	<div class="row">
		<div class="title-hd">
			<h2>ÚLTIMAS NOTÍCIAS</h2>
			<a href="https://www.imdb.com.br/news/top" class="viewall" target="_blank">VER TODAS <i class="ion-ios-arrow-right"></i></a>
		</div>
		<div class="latestnewv2">
			@foreach ($getNews as $news)
			<div class="blog-item-style-2">
				<a href="{{ $news['meta']['url'] }}" target="_blank"><img src="{{ $news['meta']['image'] }}" alt=""></a>
				<div class="blog-it-infor">
					<h3><a href="{{ $news['meta']['url'] }}" target="_blank">{{ $news['title'] }}</a></h3>
					<span class="time">{{ $news['meta']['source'] }}</span>
					<p>{{ $news['summary'] }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>