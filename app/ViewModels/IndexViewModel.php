<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Http;

class IndexViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;
    public $topRatedMovies;
    public $movieTrailers;

    public function __construct($popularMovies, $nowPlayingMovies, $genres, $topRatedMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
        $this->topRatedMovies = $topRatedMovies;
        $this->movieTrailers = $this->getTrailerMovies();
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function topRatedMovies()
    {
        return $this->formatMovies($this->topRatedMovies);
    }

    private function getTrailerMovies()
    {
         // Get Trailers
         $i=0; // Count
         $lim = 8; // Limit Number of Trailers
         $movieTrailers = array();
         foreach ($this->popularMovies as $movie) {
             $movie = Http::withToken(config('services.tmdb.token'))
                     ->get('https://api.themoviedb.org/3/movie/'.$movie['id'].'?append_to_response=videos,images')
                     ->json();
             $movieTrailers[] = $this->formatTrailer($movie);
             if (++$i === $lim) break; // Limit
         }
         // End Get Trailers
         return $movieTrailers;
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w185/'.$movie['poster_path'],
                'poster_path_slider' => 'https://image.tmdb.org/t/p/w342/'.$movie['poster_path'],
                /*'vote_average' => $movie['vote_average'] * 10 .'%',*/
                'release_date' => Carbon::parse($movie['release_date'])->format('d/m/Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'poster_path_slider', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 
                'genres', 'original_language'
            ]);
        });
    }

    private function formatTrailer($movie)
    {
        return collect($movie)->merge([
            'image' => $movie['images']['backdrops'][0]['file_path'],
            'video' => $movie['videos']['results'][0]['key'],
            'genres' => collect($movie['genres'])->pluck('name')->flatten()->implode(', '),
        ])->only([
            'id', 'title', 'video', 'image', 'genres'
        ]);
    }
}