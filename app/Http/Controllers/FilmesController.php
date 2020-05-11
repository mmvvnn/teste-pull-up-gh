<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\FilmeViewModel;
use App\ViewModels\FilmesViewModel;
use App\ViewModels\AtoresViewModel;
use App\ViewModels\NewsViewModel;
use Illuminate\Support\Facades\Http;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?language=pt-BR')
            ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing?language=pt-BR')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR')
            ->json()['genres'];

        $topRatedMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated?language=pt-BR')
            ->json()['results'];

        $popularActors = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?language=pt-BR')
            ->json()['results'];

        // Get Popular, Now Playing, Genres and Trailers
        $getMovies = new FilmesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
            $topRatedMovies
        );

        // Get popular Actors
        $getActors = new AtoresViewModel($popularActors,1);

        // Get News by IMDB
        $getNews = new NewsViewModel(5);

        // Merge
        $viewModel=collect($getMovies)->merge($getActors)->merge($getNews)->toArray(); //-toJson();
        //$viewModel = (object)$viewModel;
        //dd($viewModel);

        return view('filmes.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel = new FilmeViewModel($movie);

        return view('filmes.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}