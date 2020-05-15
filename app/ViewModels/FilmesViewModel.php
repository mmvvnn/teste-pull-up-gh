<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Http;

class FilmesViewModel extends ViewModel
{
    public $discover, $genres;

    public function __construct($discover, $genres)
    {
        $this->discover = $discover;
        $this->genres = $genres;
    }

    public function discover()
    {
        $lim = 20; // Limit per page
        $offset = 4;
        return $this->formatMovies($this->discover, $lim, $offset);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies, $lim, $offset)
    {
        // Change only in key 'results'
        $moviesResults = collect($movies['results'])->map(function($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w185/'.$movie['poster_path'],
                /*'vote_average' => $movie['vote_average'] * 10 .'%',*/
                'release_date' => Carbon::parse($movie['release_date'])->format('d F Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'title', 'vote_average', 'overview', 'release_date', 'genres', 'original_language', 
            ]);
        })->take($lim);
        // Join with another keys from movies
        $movieAll = collect($movies)->merge([
            'page' => $movies['page'],
            'total_results' => $movies['total_results'],
            'total_pages' => $movies['total_pages'],
            'per_page' => $lim,
            'offset' => $offset,
            'results' => $moviesResults
        ])->only([
            'page', 'total_results', 'total_pages', 'per_page', 'offset', 'results'
        ]);

        return $movieAll;
    }

}