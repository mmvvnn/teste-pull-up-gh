<div class="ceb-item">
	<a href="{{ route('atores.show', $actor['id']) }}"><img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}"></a>
	<div class="ceb-infor">
		<h2><a href="{{ route('atores.show', $actor['id']) }}">{{ $actor['name'] }}</a></h2>
		<span title="{{ $actor['known_for'] }}">{{ substr($actor['known_for'], 0,  25).'...' }}</span>
	</div>
</div>