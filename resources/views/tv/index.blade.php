@extends('layouts.main')

@section('meta-description', 'Séries dos mais diversos gêneros')
@section('meta-keywords', 'serie, series, hollywood, imdb, nome da serie, sinopse, ver serie, online, genero, series online, baixar serie, ep, epsodio, todos os epsodios, temporada, todas as temporadas, download')
@section('title', 'Séries')

@section('content')

    <div class="hero common-hero">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="hero-ct">
    					<h1>TODAS AS SÉRIES</h1>
    					<ul class="breadcumb">
    						<li class="active"><a href="{{ route('filmes.index') }}">INÍCIO</a></li>
    						<li> <span class="ion-ios-arrow-right"></span> SÉRIES</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="topbar-filter fw">
                    <p>Resultados encontrados: <span>{{ number_format($discover['total_results'], 0, '', '.') }}</span></p>
                        <label>Filtrar por: </label>
                        <select>
                            <option value="popularity">Maior Popularidade</option>
                            <option value="popularity">Menor Popularidade</option>
                            <option value="rating">Mais Votados</option>
                            <option value="rating">Menos Votados</option>
                            <option value="date">Mais Novos</option>
                            <option value="date">Mais Antigos</option>
                        </select>
                    </div>
                    <div class="flex-wrap-movielist mv-grid-fw">
                        @foreach ($discover['results'] as $tvshow)
                            <x-tv-card :tvshow="$tvshow" />
                        @endforeach
                         
                    </div>		
                    <div class="topbar-filter">
                        <label>Resultados por Página:</label>
                        <select>
                            <option value="20">20 Resultados</option>
                            <option value="10">10 Resultados</option>
                        </select>

                        <div class="pagination2">
                            <span>Pagina {{$discover['page']}} de {{$discover['total_pages']}}:</span>  
                            @if ($discover['total_results'] > $discover['per_page'])
                                <a href="{{ route('tv.index', 1) }}">Primeiro</a>
                                <a href="{{ route('tv.index', ($discover['page'] === 1) ? 1 : $discover['page'] - 1) }}"><i class="ion-arrow-left-b"></i></a>
                                @for ($i = $discover['page'] - $discover['offset']; $i <= $discover['page'] - 1; $i++)
                                    @if ($i >= 1)
                                        <a href="{{ route('tv.index', $i) }}">{{ $i }}</a>
                                    @endif
                                @endfor
                                <a class="active" href="#">{{ $discover['page'] }}</a>
                                @for ($i = $discover['page'] + 1; $i <= $discover['page'] + $discover['offset']; $i++)
                                    @if ($i <= $discover['total_pages'])
                                        <a href="{{ route('tv.index', $i) }}">{{ $i }}</a>
                                    @endif
                                @endfor
                                <a href="{{ route('tv.index', $discover['page'] + 1) }}"><i class="ion-arrow-right-b"></i></a>
                                <a href="{{ route('tv.index', $discover['total_pages']) }}">Último</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
