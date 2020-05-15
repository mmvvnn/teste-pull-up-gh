@extends('layouts.main')

@section('meta-description', substr($actor['biography'], 0, 320))
@section('meta-keywords', $actor['name'])
@section('title', $actor['name'])

@section('content')

<div class="hero mv-single-hero" style="background: url({{ $actor['profile_path'] }}) no-repeat center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> Ator </h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Inicio</a></li>
					<li> <span class="ion-ios-arrow-right"></span> Ator X</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>

<div class="page-single movie-single cebleb-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}">
                    @if ($social['instagram'] || $social['twitter'] || $social['facebook'] || $actor['homepage'])
                        <div class="movie-btn">	
					    	<div class="social-link cebsingle-socail">
                                @if ($social['instagram']) <a href="{{ $social['instagram'] }}" target="_blank"><i class="ion-social-instagram"></i></a> @endif
                                @if ($social['twitter']) <a href="{{ $social['twitter'] }}" target="_blank"><i class="ion-social-twitter"></i></a> @endif
                                @if ($social['facebook']) <a href="{{ $social['facebook'] }}" target="_blank"><i class="ion-social-facebook"></i></a> @endif
                                @if ($actor['homepage']) <a href="{{ $actor['homepage'] }}" target="_blank"><i class="ion-globe-outline"></i></a> @endif
                            </div>
                        </div>
                    @endif
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{ $actor['name'] }}</h1>
                    <p class="ceb-single">{{ $actor['place_of_birth'] }}</p>
                    <div class="social-link cebsingle-socail">&nbsp;</div>

					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Resumo</a></li>
								<li><a href="#biography">Biografia</a></li>
								<li><a href="#media">Mídia</a></li>
								<li><a href="#filmography">Filmografia</a></li>                     
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="title-hd-sm tab-links-2">
												<h4>Biografia Resumida</h4>
												<a href="#biography" class="time">Veja a biografia completa  <i class="ion-ios-arrow-right"></i></a>
											</div>
                                            <p>{{ \Illuminate\Support\Str::limit($actor['biography'], 500, $end='...') }}</p>
                                            <div class="title-hd-sm tab-links-2">
												<h4>Fotos</h4>
												<a href="#media" class="time">Veja todas as fotos <i class="ion-ios-arrow-right"></i></a>
											</div>
											<div class="mvsingle-item ov-item">
                                                @foreach ($images->take(4) as $image)
                                                    <a class="img-lightbox"  data-fancybox-group="gallery" href="{{ $image['file_path'] }}" ><img src="{{ $image['thumb_path'] }}"></a>
                                                @endforeach
											</div>
											<div class="title-hd-sm tab-links-2">
												<h4>Trabalhos / Atuações de Sucesso</h4>
												<a href="#filmography" class="time">Veja todos os Trabalhos  <i class="ion-ios-arrow-right"></i></a>
											</div>
                                            <!-- movie cast -->
											<div class="mvcast-item">
                                                @foreach ($knownForMovies as $movie)											
												    <div class="cast-it">
												    	<div class="cast-left cebleb-film">
                                                        <img src="{{ $movie['poster_path'] }}" alt="poster">
                                                            <div>
                                                            <a href="{{ $movie['linkToPage'] }}">{{ $movie['title'] }}</a>
                                                            <p class="time">{{ $movie['character'] }}</p>
                                                            </div>
                                                        </div>
                                                        <p>... {{ $movie['release_date'] }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
                                                <h6>Nome: </h6>
                                                <p>{{ $actor['name'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Data de Nascimento: </h6>
						            			<p>{{ $actor['birthday'] }}</p>
						            		</div>
						            		<div class="sb-it">
                                                <h6>Local de Nascimento: </h6>
                                                <p>{{ $actor['place_of_birth'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Idade:</h6>
						            			<p>{{ $actor['age'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Status:</h6>
						            			<p>{{ $actor['known_for_department'] }}</p>
                                            </div>
                                            
						            		<div class="ads">
												<img src="{{ asset('img/front/ads1.png') }}" alt="ANÚNCIO">
											</div>
						            	</div>
						            </div>
                                </div>
                                
						        <div id="biography" class="tab">
						        	<div class="row">
						            	<h3>Biografia completa de</h3>
					       	 			<h2>{{ $actor['name'] }}</h2>
										<!-- //== -->
                                        <p>{{ $actor['biography'] }}</p>
										<!-- //== -->
						            </div>
					       	 	</div>
					       	 	<div id="media" class="tab">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Fotos de</h3>
					       	 					<h2>{{ $actor['name'] }}</h2>
						            		</div>
						            	</div>
										<div class="mvsingle-item">
                                            @foreach ($images as $image)
                                                <a class="img-lightbox"  data-fancybox-group="gallery" href="{{ $image['file_path'] }}" ><img src="{{ $image['thumb_path'] }}" alt=""></a>
                                            @endforeach 
										</div>
						        	</div>
					       	 	</div>
					       	 	<div id="filmography" class="tab">
					       	 		<div class="row">
					       	 			<h3>Trabalhos / Atuações de</h3>
                                        <h2>{{ $actor['name'] }}</h2>
                                        <div class="mvcast-item">
                                            @foreach ($credits as $credit)
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="{{ $credit['poster_path'] }}" alt="poster">
                                                    <div>
                                                        <a href="{{ $credit['linkToPage'] }}">{{ $credit['title'] }} </a>
                                                        <p class="time">{{ $credit['character'] }}</p>
                                                    </div>

                                                </div>
                                                <p>...  {{ $credit['release_year'] }}</p>
                                            </div>
                                            @endforeach
                                        </div>
					       	 		</div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection