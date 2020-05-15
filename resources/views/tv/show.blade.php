@extends('layouts.main')

@section('meta-description', substr($tvshow['overview'], 0, 320))
@section('meta-keywords', collect($keywords)->pluck('name')->flatten()->implode(', '))
@section('title', $tvshow['name'])

@section('content')

<div class="hero mv-single-hero" style="background: url({{ $tvshow['backdrop_path'] }}) no-repeat center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> Filme </h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Inicio</a></li>
					<li> <span class="ion-ios-arrow-right"></span> Filme X</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>

<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{ $tvshow['poster_path'] }}" alt="{{ $tvshow['name'] }}">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="https://www.youtube.com/embed/{{ $trailer['video'] }}" class="item item-1 redbtn"> <i class="ion-play"></i> Assistir Trailer</a></div>
							<div><a href="https://www.youtube.com/embed/{{ $trailer['video'] }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
						<div class="btn-transform transform-vertical">
							<div><a href="{{ $tvshow['homepage'] }}" class="item item-1 yellowbtn" target="_blank"> <i class="ion-card"></i> Link Oficial</a></div>
							<div><a href="{{ $tvshow['homepage'] }}" class="item item-2 yellowbtn" target="_blank"><i class="ion-card"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{ $tvshow['name'] }} <span>{{ $tvshow['first_air_date'] }}</span></h1>
					<div class="social-btn">
						<a href="#" class="parent-btn add-favorite"><i class="ion-heart"></i> Adicionar aos Favoritos</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i> Compartilhar</a>
							<div class="hvr-item social-share">
								<a href="#" class="hvr-grow facebook"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow twitter"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow whatsapp"><i class="ion-social-whatsapp"></i></a>
							</div>
						</div>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{ $tvshow['vote_average'] }}</span> /10<br>
								<span class="rv">56 Avaliações</span>
							</p>
						</div>
						<div class="rate-star">
							<p>Avalie esta Série:  </p>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star-outline"></i>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Sinopse</a></li>
								<li><a href="#reviews">Avaliações</a></li>
								<li><a href="#cast">Equipe</a></li>
                                <li><a href="#media">Mídia</a></li> 
                                <li><a href="#season">Temporadas</a></li> 
								<li><a href="#moviesrelated">Séries Relacionadas</a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>{{ $tvshow['overview'] }}</p>
                                            <div class="title-hd-sm tab-links-2">
												<h4>Temporada Atual</h4>
												<a href="#season" class="time">Veja todas as Temporadas <i class="ion-ios-arrow-right"></i></a>
											</div>
                                            <div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left series-it">
                                                        <img src="{{ $tvshow['latestSeason']['poster_path'] }}" alt="{{ $tvshow['latestSeason']['name'] }}">
														<div>
															<a href="#season">{{ $tvshow['latestSeason']['name'] }}</a>
															<p>{{ $tvshow['latestSeason']['episode_count'] }} Episódios</p>
															<p>Temporada {{ $tvshow['latestSeason']['season_number'] }} de {{ $tvshow['name'] }} lançada em 
                                                            {{ $tvshow['latestSeason']['air_date'] }}.</p>
                                                        </div>
													</div>											
												</div>	
											</div>
                                            <div class="title-hd-sm tab-links-2">
												<h4>Imagens & Vídeos</h4>
												<a href="#media" class="time">Veja todas as imagens e vídeos <i class="ion-ios-arrow-right"></i></a>
											</div>
											<div class="mvsingle-item ov-item">
                                                @foreach ($tvshow['images']->take(3) as $image)
                                                    <a class="img-lightbox"  data-fancybox-group="gallery" href="{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}" ><img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}"></a>
                                                @endforeach
												
												<div class="vd-it">
													<img class="vd-img" src="https://img.youtube.com/vi/{{ $trailer['video'] }}/default.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/{{ $trailer['video'] }}"><img src="{{ asset('img/front/play-vd.png') }}" alt=""></a>
												</div>
                                            </div>
											<div class="title-hd-sm tab-links-2">
												<h4>Elenco</h4>
												<a href="#cast" class="time">Veja todo o elenco  <i class="ion-ios-arrow-right"></i></a>
											</div>
                                            <!-- movie cast -->
											<div class="mvcast-item">
                                                @foreach ($tvshow['cast']->take(6) as $cast)											
												    <div class="cast-it">
												    	<div class="cast-left">
												    		<img src="{{ $cast['profile_path'] }}" alt="">
												    		<a href="{{ route('atores.show', $cast['id']) }}">{{ $cast['name'] }}</a>
												    	</div>
												    	<p>...  {{ $cast['character'] }}</p>
                                                    </div>
                                                @endforeach
											</div>
											<div class="title-hd-sm tab-links-2">
												<h4>Avaliações</h4>
												<a href="#reviews" class="time">Veja todas as avaliações <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie user review -->
											<div class="mv-user-review-item">
												<h3>Melhor filme na minha opinião</h3>
												<div class="no-star">
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star last"></i>
												</div>
												<p class="time">
													17/12/2018 por <a href="#reviews"> João Paulo</a>
                                                </p>
                                                <p>Este é de longe um dos meus filmes favoritos do MCU. A introdução de novos personagens, bons e ruins, também torna o filme mais emocionante. dar aos personagens mais uma história de fundo também pode ajudar o público a se relacionar melhor com diferentes personagens e conectar um vínculo entre o público e os atores ou personagens. Ver o filme três vezes não me incomoda aqui, pois é tão emocionante e emocionante toda vez que o assisto. Em outras palavras, o filme é muito melhor do que os filmes anteriores (e eu amo tudo da Marvel), a trama é esplêndida (eles realmente se saem em cada filme, não há problemas em assistir mais de uma vez.</p>
                                            </div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
                                                <h6>Criado por: </h6>
                                                <p>
                                                    @foreach ($tvshow['created_by'] as $created_by)											
                                                        <a href="{{ route('atores.show', $created_by['id']) }}">{{ $created_by['name'] }} </a>
                                                    @endforeach
                                                </p>
						            		</div>
						            		<div class="sb-it">
                                                <h6>Estrelas: </h6>
                                                <p>
                                                    @foreach ($tvshow['cast']->take(4) as $cast)											
                                                        <a href="{{ route('atores.show', $cast['id']) }}">{{ $cast['name'] }}</a>, 
                                                    @endforeach
                                                </p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Gêneros:</h6>
						            			<p>{{ $tvshow['genres'] }}</p>
                                            </div>
                                            <div class="sb-it">
						            			<h6>Número de Temporadas:</h6>
						            			<p>{{ $tvshow['number_of_seasons'] }}</p>
                                            </div>
                                            <div class="sb-it">
						            			<h6>Número de Episódios:</h6>
						            			<p>{{ $tvshow['number_of_episodes'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Primeira Temporada:</h6>
						            			<p>{{ $tvshow['first_air_date'] }}</p>
                                            </div>
                                            <div class="sb-it">
						            			<h6>Última Temporada:</h6>
						            			<p>{{ $tvshow['last_air_date'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Duração / Episódio:</h6>
						            			<p>{{ $tvshow['episode_run_time'] }} min</p>
                                            </div>
						            		<div class="sb-it">
						            			<h6>Status:</h6>
						            			<p>{{ $tvshow['status'] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Palavras-Chave:</h6>
						            			<p class="tags">
                                                    @foreach ($keywords as $keyword)
                                                        <span class="time"><a href="#">{{ $keyword['name'] }}</a></span>
													@endforeach
						            			</p>
						            		</div>
						            		<div class="ads">
												<img src="{{ asset('img/front/ads1.png') }}" alt="ANÚNCIO">
											</div>
						            	</div>
						            </div>
                                </div>
						        <div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>Reviews relacionados à</h3>
						       	 				<h2>{{ $tvshow['name'] }}</h2>
							            	</div>
							            	<a href="#" class="redbtn add-review">Avaliar</a>
						            	</div>
						            	<div class="topbar-filter">
											<p>Reviews encontrados: <span>2 reviews</span> no total</p>
										</div>
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="{{ asset('img/front/user-profile.jpg') }}" alt="">
												<div>
													<h3>Me diverti bastante com esse filme</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														04/04/2020 por <a href="#reviews"> Júlia Oliveira</a>
													</p>
												</div>
                                            </div>
                                            <p>Se não houvesse uma audiência para os heróis cômicos da Marvel, claramente esses filmes não seriam feitos, para responder a outro crítico, embora eu simpatize com ele. O mundo é realmente um lugar infinitamente mais complexo que o mundo dos quadrinhos da Marvel, com heróis e vilões claramente identificáveis. Mas tenho a sensação de que, de Robert Downey Jr. até o organizador e ator principal como Homem de Ferro por trás dos Vingadores, esses jogadores adoram fazer esses papéis porque é muito divertido. Se eles não mostrassem esse espírito de diversão para o público, esses filmes nunca seriam feitos.</p>
                                        </div>
                                        <div class="mv-user-review-item last">
											<div class="user-infor">
												<img src="{{ asset('img/front/user-profile.jpg') }}" alt="">
												<div>
													<h3>Melhor filme na minha opinião</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														17/12/2018 por <a href="#review"> João Paulo</a>
													</p>
												</div>
                                            </div>
                                            <p>Este é de longe um dos meus filmes favoritos do MCU. A introdução de novos personagens, bons e ruins, também torna o filme mais emocionante. dar aos personagens mais uma história de fundo também pode ajudar o público a se relacionar melhor com diferentes personagens e conectar um vínculo entre o público e os atores ou personagens. Ver o filme três vezes não me incomoda aqui, pois é tão emocionante e emocionante toda vez que o assisto. Em outras palavras, o filme é muito melhor do que os filmes anteriores (e eu amo tudo da Marvel), a trama é esplêndida (eles realmente se saem em cada filme, não há problemas em assistir mais de uma vez.</p>
                                        </div>
										<div class="topbar-filter">
											<div class="pagination2">
												<span>Página 1 de 1:</span>
												<a class="active" href="#">1</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div>
						            </div>
						        </div>
						        <div id="cast" class="tab">
						        	<div class="row">
						            	<h3>Elenco e equipe de</h3>
					       	 			<h2>{{ $tvshow['name'] }}</h2>
										<!-- //== -->
					       	 			<div class="title-hd-sm">
											<h4>Criadores</h4>
										</div>
										<div class="mvcast-item">
                                            @foreach ($tvshow['created_by'] as $created_by)											
												<div class="cast-it">
													<div class="cast-left">
														<img src="{{ $created_by['profile_path'] }}" alt="{{ $created_by['name'] }}">
														<a href="{{ route('atores.show', $created_by['id']) }}">{{ $created_by['name'] }}</a>
													</div>
													<p>...  </p>
                                                </div>
                                            @endforeach	
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Elenco</h4>
										</div>
										<div class="mvcast-item">
                                            @foreach ($tvshow['cast'] as $cast)											
												<div class="cast-it">
													<div class="cast-left">
														<img src="{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}">
														<a href="{{ route('atores.show', $cast['id']) }}">{{ $cast['name'] }}</a>
													</div>
													<p>...  {{ $cast['character'] }}</p>
                                                </div>
                                            @endforeach	
										</div>
										<!-- //== -->
						            </div>
					       	 	</div>
					       	 	<div id="media" class="tab">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Vídeos & Imagens de</h3>
					       	 					<h2>{{ $tvshow['name'] }}</h2>
						            		</div>
						            	</div>
						            	<div class="title-hd-sm">
											<h4>Videos <span>(Oficiais)</span></h4>
										</div>
										<div class="mvsingle-item media-item">
                                            @foreach (collect($tvshow['videos']['results'])->take(4) as $video)
                                                <div class="vd-item">
											    	<div class="vd-it">
											    		<img class="vd-img" src="https://img.youtube.com/vi/{{ $video['key'] }}/default.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow"  href="https://www.youtube.com/embed/{{ $video['key'] }}"><img src="{{ asset('img/front/play-vd.png') }}" alt="{{ $video['name'] }}"></a>
											    	</div>
											    	<div class="vd-infor">
											    		<h6> <a href="#">{{ $video['name'] }}</a></h6>
											    		<p class="time"> {{ $video['site'] }}</p>
											    	</div>
                                                </div>
                                            @endforeach
										</div>
										<div class="title-hd-sm">
											<h4>Imagens <span> (Oficiais)</span></h4>
										</div>
										<div class="mvsingle-item">
                                            @foreach ($tvshow['images'] as $image)
                                                <a class="img-lightbox"  data-fancybox-group="gallery" href="{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}" ><img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt=""></a>
                                            @endforeach 
										</div>
						        	</div>
					       	 	</div>
                                <div id="season" class="tab">
					       	 		<div class="row">
					       	 			<h3>Temporadas da Série</h3>
                                        <h2>{{ $tvshow['name'] }}</h2>
                                        
                                        @foreach ($tvshow['seasons'] as $season)
										<div class="mvcast-item">											
                                            <div class="cast-it">
                                                <div class="cast-left series-it">
                                                    <img src="{{ $season['poster_path'] }}" alt="{{ $season['name'] }}">
                                                    <div>
                                                        <a href="#season">{{ $season['name'] }}</a>
                                                        <p>{{ $season['episode_count'] }} Episódios</p>
                                                        <p>Temporada {{ $season['season_number'] }} de {{ $tvshow['name'] }} lançada em 
                                                        {{ $season['air_date'] }}.</p>
                                                    </div>
                                                </div>											
                                            </div>	
                                        </div>
                                        @endforeach
                                        
					       	 		</div>
					       	 	</div>
                                <div id="moviesrelated" class="tab">
					       	 		<div class="row">
					       	 			<h3>Séries Relacionadas à</h3>
                                        <h2>{{ $tvshow['name'] }}</h2>
                                        
                                        @foreach ($similars as $similar)
										<div class="movie-item-style-2" onclick="window.open('{{ route('tv.show', $similar['id']) }}','_self')">
                                        <img src="{{ $similar['poster_path'] }}" alt="{{ $similar['name'] }}">
											<div class="mv-item-infor">
												<h6><a href="{{ route('tv.show', $similar['id']) }}">{{ $similar['name'] }} <span>({{ $similar['first_air_date'] }})</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>{{ $similar['vote_average'] }}</span> /10</p>
												<p class="describe">{{ $similar['overview'] }}</p>
												<p class="run-time">Popularidade: {{ $similar['popularity'] }}</p>
											</div>
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

@endsection