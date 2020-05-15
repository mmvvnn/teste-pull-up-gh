<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class AtorViewModel extends ViewModel
{
    public $actor, $social, $credits, $images;

    public function __construct($actor, $social, $credits, $images)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
        $this->images = $images;
    }

    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('d/m/Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x450',
        ])->only([
            'birthday', 'age', 'profile_path', 'name', 'id', 'homepage', 'place_of_birth', 'biography', 'known_for_department'
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'instagram', 'twitter',
        ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function($movie) {
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w92'.$movie['poster_path']
                    : 'https://via.placeholder.com/92x138',
                'title' => $title,
                'release_date' => $movie['media_type'] === 'movie' ? Carbon::parse($movie['release_date'])->format('Y') : Carbon::parse($movie['first_air_date'])->format('Y'),
                'linkToPage' => $movie['media_type'] === 'movie' ? route('filmes.show', $movie['id']) : route('tv.show', $movie['id'])
            ])->only([
                'poster_path', 'title', 'id', 'media_type', 'linkToPage', 'character', 'release_date'
            ]);
        });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->map(function($movie) {
            if (isset($movie['release_date'])) {
                $releaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $releaseDate = $movie['first_air_date'];
            } else {
                $releaseDate = '';
            }

            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Em Breve',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
                'linkToPage' => $movie['media_type'] === 'movie' ? route('filmes.show', $movie['id']) : route('tv.show', $movie['id']),
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w92/'.$movie['poster_path']
                    : 'https://via.placeholder.com/92x138',
            ])->only([
                'release_date', 'release_year', 'title', 'character', 'linkToPage', 'poster_path'
            ]);
        })->sortByDesc('release_date');
    }

    public function images()
    {
        return collect($this->images)->map(function($image) {
            return collect($image)->merge([
                'file_path' => $image['file_path']
                    ? 'https://image.tmdb.org/t/p/w500/'.$image['file_path']
                    : 'https://via.placeholder.com/500x750',
                'thumb_path' => $image['file_path']
                    ? 'https://image.tmdb.org/t/p/w154/'.$image['file_path']
                    : 'https://via.placeholder.com/154x231',
                ])->only([
                    'file_path', 'thumb_path'
            ]);
        })->take(12);
    }

}
