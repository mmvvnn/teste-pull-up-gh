@foreach ($topRatedMovies as $movie)
<div class="movie-item">
    <div class="row">
	    <div class="col-md-8 col-sm-12 col-xs-12">
		    <div class="title-in">
			    <div class="cate">
                   <span class="yell">{{ $movie['genres'] }}</span>
			    </div>
			    <h1>
                    <a href="{{ route('filmes.show', $movie['id']) }}">{{ $movie['title'] }}<br>
                    <span>{{ $movie['release_date'] }}</span></a>
                </h1>
			    <div class="social-btn">
				    <a href="{{ route('filmes.show', $movie['id']) }}" class="parent-btn"><i class="ion-play"></i> Assistir Trailer</a>
				    <a href="{{ route('user.favourite') }}" class="parent-btn"><i class="ion-heart"></i> Adicionar Favorito</a>	
			    </div>
			    <div class="mv-details">
				    <p><i class="ion-android-star"></i><span>{{ $movie['vote_average'] }}</span> / 10</p>
				    <ul class="mv-infor">
					    <li>  Idioma Original: {{ $movie['original_language'] }}  </li>
					    <li>  Estreia: {{ $movie['release_date'] }}</li>
				    </ul>
			    </div>
			    <div class="btn-transform transform-vertical">
				    <div><a href="{{ route('filmes.show', $movie['id']) }}" class="item item-1 redbtn">DETALHES</a></div>
				    <div><a href= "{{ route('filmes.show', $movie['id']) }}" class="item item-2 redbtn hvrbtn">DETALHES</a></div>
			    </div>		
		    </div>
	    </div>
	    <div class="col-md-4 col-sm-12 col-xs-12">
		    <div class="mv-img-2">
			    <a href="{{ route('filmes.show', $movie['id']) }}"><img src="{{ $movie['poster_path_slider'] }}" alt="" width="270" height="414"></a>
		    </div>
	    </div>
    </div>	
</div>
@endforeach