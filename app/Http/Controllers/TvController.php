<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $discover = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/tv?language=pt-BR&sort_by=popularity.desc&page='.$page)
            ->json();

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list?language=pt-BR')
            ->json()['genres'];

        // Get Popular, Now Playing, Genres and Trailers
        $getTv = new TvViewModel(
            $discover,
            $genres
        );

        // Merge
        $viewModel=$getTv; //-toJson();
        //$viewModel = (object)$viewModel;
        //dd($viewModel);

        return view('tv.index', $viewModel);
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
        $tvshow = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $similars = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'/similar?language=pt-BR')
            ->json()['results'];

        $keywords = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'/keywords?language=pt-BR')
            ->json()['results'];

        $viewModel = new TvShowViewModel($tvshow, $similars, $keywords);

        return view('tv.show', $viewModel);
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
