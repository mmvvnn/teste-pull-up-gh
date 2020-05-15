@extends('layouts.main')

@section('meta-description', 'Atores e atrizes de filmes e séries')
@section('meta-keywords', 'atores, atrizes, hollywood, nome do ator, serie, ator da serie, ator do filme, atriz, ator, celebridades')
@section('title', 'Celebridades')

@section('content')

    <div class="hero common-hero">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="hero-ct">
    					<h1>TODAS AS CELEBRIDADES</h1>
    					<ul class="breadcumb">
    						<li class="active"><a href="{{ route('filmes.index') }}">INÍCIO</a></li>
    						<li> <span class="ion-ios-arrow-right"></span> CELEBRIDADES</li>
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
                    <p>Resultados encontrados: <span> Teste</span></p>
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

                    <div class="celebrity-items">
                        @foreach ($popularActors as $actor)
                            <x-actors-card :actor="$actor" />
                        @endforeach
                    </div>

                    <div class="page-load-status">
                        <div class="flex justify-center">
                            <div class="infinite-scroll-request spinner text-4xl">&nbsp;</div>
                        </div>
                        <p class="infinite-scroll-last">ISSO É TUDO</p>
                        <p class="infinite-scroll-error">ERRO</p>
                    </div>

                    {{-- <div class="flex justify-between mt-16">
                        @if ($previous)
                            <a href="/celebridades/pagina/{{ $previous }}">Anterior</a>
                        @else
                            <div></div>
                        @endif


                        @if ($next)
                            <a href="/celebridades/pagina/{{ $next }}">Proximo</a>
                        @else
                            <div></div>
                        @endif

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
    var elem = document.querySelector('.celebrity-items');
    var infScroll = new InfiniteScroll( elem, {
      path: '/celebridades/todas/@{{#}}',
      append: '.ceb-item',
      status: '.page-load-status',
      // history: false,
    });

</script>
@endsection
