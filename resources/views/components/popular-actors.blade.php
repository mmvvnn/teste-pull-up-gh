<div class="col-md-3 col-sm-12 col-xs-12">
	<div class="sidebar">
		<div class="celebrities">
			<h4 class="sb-title">CELEBRIDADES POPULARES</h4>
			@foreach (collect($popularActors)->take(5) as $actor)
				<div class="celeb-item">
					<a href="{{ route('atores.show', $actor['id']) }}"><img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}" width="70" height="70"></a>
					<div class="celeb-author">
						<h6><a href="#">{{ $actor['name'] }}</a></h6>
						<span></span>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>