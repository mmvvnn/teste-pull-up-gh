<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
    <html lang="pt-br" class="no-js">
    <head>
    <meta charset="UTF-8">
    @yield('meta-description')
    @yield('meta-keywords')
    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">
    <title>Pull Up - Movie Review - By Marcelo</title>

    <!-- CSS files -->
    <link href="{{ asset('css/front/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/style.css') }}" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="{{ asset('img/front') }}/logo1.png" alt="" width="119" height="58">
        <div id="status">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--end of preloading-->

    <!--login form popup-->
    @yield('login-form')
    <!--end of login form popup-->

    <!--signup form popup-->
    @yield('signup-form')
    <!--end of signup form popup-->

    <!-- BEGIN | Header -->
    <header class="ht-header full-width-hd">
    <div class="row">
        <nav id="mainNav" class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="{{ route('filmes.index') }}"><img class="logo" src="{{ asset('img/front') }}/logo1.png" alt="Logo" width="119" height="58"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a href="{{ route('filmes.index') }}">Inicio</a></li>
                    <li><a href="{{ route('filmes.filmes') }}">Filmes</a></li>
                    <li><a href="{{ route('tv.index') }}">Séries de TV</a></li>
                    <li><a href="{{ route('atores.index') }}">Celebridades</a></li>
                    <li><a href="{{ route('filmes.index') }}#latest-news">Notícias</a></li>
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    <li><a href="{{ route('about') }}">Sobre o Sistema</a></li>
                    <li class="loginLink"><a href="#">Entrar</a></li>
                    <li class="btn signupLink"><a href="#">Cadastrar</a></li>
                </ul>
            </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!-- search form -->
    <div class="top-search">
	    <livewire:search-dropdown>
    </div>
    <!-- end search form -->
    </div>
    </header>
    <!-- END | Header -->

    <!--content section-->
    @yield('content')
    <!--end content section-->

    <!-- footer section-->
    <footer class="ht-footer full-width-ft">
	<div class="row">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="{{ route('filmes.index') }}"><img class="logo" src="{{ asset('img/front') }}/logo1.png" alt="Logo"></a>
				 <p>Projeto desenvolvido em Laravel 7<br>
				utilizando a API TMDB - Para </p>
				<p><a href="https://www.pullup.tech/" target="_blank">Pull Up (By Marcelo)</a></p>
			</div>
			<div class="flex-child-ft item2 generes">
				<h4>Gêneros</h4>
				{{-- <ul>
                    @foreach (collect($genres)->take(18) as $gen_id => $gen_name)
                        <li><a href="#{{ $gen_id }}">{{ $gen_name }}</a></li>
                    @endforeach
				</ul> --}}
			</div>
			<div class="flex-child-ft item3">
				<h4>Páginas</h4>
				<ul>
                    <li><a href="{{ route('filmes.index') }}">Início</a></li>
					<li><a href="{{ route('filmes.filmes') }}">Filmes</a></li>
                    <li><a href="{{ route('tv.index') }}">Séries de TV</a></li>
                    <li><a href="{{ route('atores.index') }}">Celebridades</a></li>
                    <li><a href="{{ route('filmes.index') }}#latest-news">Notícias</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item4">
				<h4>Minha Conta</h4>
				<ul>
					<li><a href="{{ route('user.manage') }}">Meus Dados</a></li> 
					<li><a href="{{ route('user.watchlist') }}">Lista para Assistir</a></li>	
					<li><a href="{{ route('user.favourite') }}">Lista de Favoritos</a></li>
					<li><a href="{{ route('user.review') }}">Minhas Avaliações</a></li>
				</ul>
			</div>
			{{-- <div class="flex-child-ft item5">
				<h4>Newsletter</h4>
				<p>Informe seu e-mail <br> e fique sempre por dentro das novidades.</p>
				<form action="#">
					<input type="text" placeholder="Seu e-mail" required>
				</form>
				<a href="#" class="btn">Cadastrar <i class="ion-ios-arrow-forward"></i></a>
			</div> --}}
		</div>
		<div class="ft-copyright">
			<div class="ft-left">
				<p>© 2020. Pull Up - Movie Review. Desenvolvido por <a href="mailto:maarvvini@gmail.com">Marcelo Vinicius</a></p>
			</div>
			<div class="backtotop">
				<p><a href="#" id="back-to-top">Voltar ao Topo  <i class="ion-ios-arrow-thin-up"></i></a></p>
			</div>
		</div>
	</div>
    </footer>
    <!-- end of footer v2 section-->
    <!-- Scripts -->
    <script src="{{ asset('js/front/jquery.js') }}" defer></script>
    <script src="{{ asset('js/front/plugins.js') }}" defer></script>
    <script src="{{ asset('js/front/plugins2.js') }}" defer></script>
    <script src="{{ asset('js/front/custom.js') }}" defer></script>
    <livewire:scripts>
    @yield('scripts')
</body>
</html>
