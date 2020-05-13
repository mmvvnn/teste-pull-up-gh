<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class FilmeViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        $movie = collect($this->movie)->merge([
            'backdrop_path' => $this->movie['backdrop_path']
                ? 'https://image.tmdb.org/t/p/w1280/'.$this->movie['poster_path']
                : 'https://via.placeholder.com/1920x806',
            'poster_path' => $this->movie['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path']
                : 'https://via.placeholder.com/500x750',
            /*'vote_average' => $this->movie['vote_average'] * 10 .'%',*/
            'release_date' => Carbon::parse($this->movie['release_date'])->format('d M Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(5),
            'cast' => collect($this->movie['credits']['cast'])->take(10)->map(function($cast) {
                return collect($cast)->merge([
                    'profile_path' => $cast['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45'.$cast['profile_path']
                        : 'https://via.placeholder.com/45x45',
                ]);
            }),
            'directors'=> collect($this->movie['credits']['crew'])->where('job', 'Director')->take(2)->map(function($director) {
                return collect($director)->merge([
                    'profile_path' => $director['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45'.$director['profile_path']
                        : 'https://via.placeholder.com/45x45',
                ]);
            }),
            'producers'=> collect($this->movie['credits']['crew'])->where('job', 'Producer')->take(3)->map(function($producer) {
                return collect($producer)->merge([
                    'profile_path' => $producer['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45'.$producer['profile_path']
                        : 'https://via.placeholder.com/45x45',
                ]);
            }),
            /*'stars'=> collect($this->movie['credits']['cast'])->sortBy('order')->take(4),*/
            'images' => collect($this->movie['images']['backdrops'])->take(12),
        ])->only([
            'backdrop_path', 'poster_path', 'id', 'genres', 'title', 'vote_average', 'overview', 'release_date', 'credits' ,
            'videos', 'images', 'crew', 'cast', 'directors', 'producers', 'runtime', 'homepage', 'status', 
        ]);

        //dd($movie);
        
        return $movie;
    }

    public function trailer()
    {
        $trailer = collect($this->movie)->merge([
            'poster_path' => $this->movie['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path']
                : 'https://via.placeholder.com/500x750',
            'image' => $this->movie['images']['backdrops'][0]['file_path'],
            'video' => $this->movie['videos']['results'][0]['key'],
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
        ])->only([
            'poster_path', 'id', 'title', 'video', 'image', 'genres', 
        ]);

        return $trailer;
    }
}