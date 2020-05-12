<div class="slide-it">
    <div class="movie-item">
        <div class="mv-img">
            <img src="{{ $movie['poster_path'] }}" alt="poster">
        </div>
        <div class="hvr-inner">
            <a  href="{{ route('filmes.show', $movie['id']) }}"> DETALHES <i class="ion-android-arrow-dropright"></i> </a>
        </div>
        <div class="title-in">
            <h6><a href="{{ route('filmes.show', $movie['id']) }}">{{ $movie['title'] }}</a></h6>
            <p><i class="ion-android-star"></i><span>{{ $movie['vote_average'] }}</span> / 10</p>
        </div>
    </div>
</div>
