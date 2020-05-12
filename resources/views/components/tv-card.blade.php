<div class="movie-item-style-2 movie-item-style-1">
    <img src="{{ $tvshow['poster_path'] }}" alt="poster">
    <div class="hvr-inner">
        <a  href="{{ route('tv.show', $tvshow['id']) }}"> DETALHES <i class="ion-android-arrow-dropright"></i> </a>
    </div>
    <div class="mv-item-infor">
        <h6><a href="#">{{ $tvshow['name'] }}</a></h6>
        <p class="rate"><i class="ion-android-star"></i><span>{{ $tvshow['vote_average'] }}</span> / 10</p>
    </div>
</div>