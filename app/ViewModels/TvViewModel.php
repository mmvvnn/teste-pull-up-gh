<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
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
        return $this->formatTv($this->discover, $lim, $offset);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tv, $lim, $offset)
    {
        // Change only in key 'results'
        $tvResults = collect($tv['results'])->map(function($tvshow) {
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                /*'vote_average' => $tvshow['vote_average'] * 10 .'%',*/
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('d F Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'name', 'vote_average', 'overview', 'first_air_date', 'genres', 
            ]);
        })->take($lim);
        // Join with another keys from tv
        $tvAll = collect($tv)->merge([
            'page' => $tv['page'],
            'total_results' => $tv['total_results'],
            'total_pages' => $tv['total_pages'],
            'per_page' => $lim,
            'offset' => $offset,
            'results' => $tvResults
        ])->only([
            'page', 'total_results', 'total_pages', 'per_page', 'offset', 'results'
        ]);
        
        return $tvAll;
    }

}
