@extends('layouts.main')

@section('content')

    <!-- Home Slider -->
    <div class="slider sliderv2">
	    <div class="container">
		    <div class="row">
	    	    <div class="slider-single-item">
                    
                    <!-- Home Slider Loop -->
                    @include('filmes.home-slider')
                    <!-- End Home Slider Loop -->
                    
	    	    </div>
	        </div>
	    </div>
    </div>
    <!-- End Home Slider -->

    <!-- Section Movies -->
    <div class="movie-items  full-width">
	    <div class="row">
		    <div class="col-md-12">

                <!-- Em Cartaz -->
                <div class="title-hd">
				    <h2>EM CARTAZ</h2>
				    <a href="{{ route('filmes.filmes') }}" class="viewall">VER TODOS <i class="ion-ios-arrow-right"></i></a>
			    </div>
                
			    <div class="row">
			        <div class="slick-multiItem2">
                        @foreach ($nowPlayingMovies as $movie)
                            <x-movie-card-slide :movie="$movie" />
                        @endforeach
                    </div>
                </div>
                <!-- Fim Em Cartaz -->
                
                <!-- Populares -->
			    <div class="title-hd">
				    <h2>FILMES POPULARES</h2>
				    <a href="{{ route('filmes.filmes') }}" class="viewall">VER TODOS <i class="ion-ios-arrow-right"></i></a>
			    </div>
                
			    <div class="row">
			        <div class="slick-multiItem2">
                        @foreach ($popularMovies as $movie)
                            <x-movie-card-slide :movie="$movie" />
                        @endforeach
                    </div>
                </div>
                <!-- Fim Populares -->

            </div>
        </div>
    </div>
    <!-- End Section Movies -->

    <!-- Home Thrailers -->
    @include('filmes.trailer-slider')
	<!-- End Home Thrailers -->
	
	<!-- News from Imdb -->
    @include('components.news-imdb')
    <!-- End News from Imdb -->

@endsection
