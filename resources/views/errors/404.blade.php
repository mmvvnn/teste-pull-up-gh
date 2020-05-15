@extends('layouts.main')

@section('meta-description', '404')
@section('meta-keywords', '404')
@section('title', '404')

@section('content')
<div class="page-single-2">
	<div class="container">
		<div class="row">
			<div class="middle-content">
                <a href="{{ route('filmes.index') }}"><img class="md-logo" src="{{ asset('img/front/logo1.png') }}" alt=""></a>
				<img src="{{ asset('img/front/err-img.png') }}" alt="Erro 404">
				<h1>PÁGINA NÃO ENCONTRADA</h1>
                <a href="{{ route('filmes.index') }}" class="redbtn">VOLTAR PARA PÁGINA INICIAL</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('404-style')
<style>
    header, footer { display: none !important; visibility: hidden !important; }
</style>
@endsection