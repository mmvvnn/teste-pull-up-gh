<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow, $similars, $keywords;

    public function __construct($tvshow, $similars, $keywords)
    {
        $this->tvshow = $tvshow;
        $this->similars = $similars;
        $this->keywords = $keywords;
    }

    public function tvshow()
    {
        $tvshow = collect($this->tvshow)->merge([
            'backdrop_path' => $this->tvshow['backdrop_path']
                ? 'https://image.tmdb.org/t/p/w1280/'.$this->tvshow['poster_path']
                : 'https://via.placeholder.com/1920x806',
            'poster_path' => $this->tvshow['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/'.$this->tvshow['poster_path']
                : 'https://via.placeholder.com/500x750',
            /*'vote_average' => $this->tvshow['vote_average'] * 10 .'%',*/
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('d/m/Y'),
            'last_air_date' => Carbon::parse($this->tvshow['last_air_date'])->format('d/m/Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(5),
            'cast' => collect($this->tvshow['credits']['cast'])->take(10)->map(function($cast) {
                return collect($cast)->merge([
                    'profile_path' => $cast['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45'.$cast['profile_path']
                        : 'https://via.placeholder.com/45x45',
                ]);
            }),
            'created_by' => collect($this->tvshow['created_by'])->map(function($created_by) {
                return collect($created_by)->merge([
                    'profile_path' => $created_by['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45'.$created_by['profile_path']
                        : 'https://via.placeholder.com/45x45',
                ]);
            }),
            'seasons' => collect($this->tvshow['seasons'])->map(function($season) {
                return collect($season)->merge([
                    'poster_path' => $season['poster_path']
                        ? 'https://image.tmdb.org/t/p/w154'.$season['poster_path']
                        : 'https://via.placeholder.com/154x231',
                    'air_date' => Carbon::parse($season['air_date'])->format('d/m/Y'),
                ]);
            }),
            'latestSeason' => collect($this->tvshow['seasons'])->map(function($season) {
                return collect($season)->merge([
                    'poster_path' => $season['poster_path']
                        ? 'https://image.tmdb.org/t/p/w154'.$season['poster_path']
                        : 'https://via.placeholder.com/154x231',
                    'air_date' => Carbon::parse($season['air_date'])->format('d/m/Y'),
                ]);
            })->last(),
            'episode_run_time' => $this->tvshow['episode_run_time'][0],
            /*'stars'=> collect($this->tvshow['credits']['cast'])->sortBy('order')->take(4),*/
            'images' => collect($this->tvshow['images']['backdrops'])->take(12),
        ])->except([
            'languages', 'next_episode_to_air', 'networks', 'origin_country', 'original_language', 'original_name', 'popularity', 
            'production_companies', 'type', 'vote_count'
        ]);

        //dd($tvshow);
        
        return $tvshow;
    }

    public function trailer()
    {
        $trailer = collect($this->tvshow)->merge([
            'image' => $this->tvshow['images']['backdrops'][0]['file_path'],
            'video' => $this->tvshow['videos']['results'][0]['key'],
        ])->only([
            'id', 'name', 'video', 'image' 
        ]);

        return $trailer;
    }

    public function similars()
    {
        $similars = collect($this->similars)->map(function($similar) {
            return collect($similar)->merge([
                'poster_path' => collect($similar['poster_path'])
                    ? 'https://image.tmdb.org/t/p/w342/'.$similar['poster_path']
                    : 'https://via.placeholder.com/342x513',
                'first_air_date' => Carbon::parse($similar['first_air_date'])->format('Y')
            ])->only([
                'poster_path', 'id', 'name', 'overview', 'first_air_date', 'vote_average', 'popularity'
            ]);
        })->take(4);

        return $similars;
    }
}