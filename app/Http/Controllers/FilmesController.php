<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\FilmeViewModel;
use App\ViewModels\FilmesViewModel;
use Illuminate\Support\Facades\Http;
	


class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $discover = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie?language=pt-BR&sort_by=popularity.desc&page='.$page)
            ->json();

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR')
            ->json()['genres'];

        // Get Popular, Now Playing, Genres and Trailers
        $getMovies = new FilmesViewModel(
            $discover,
            $genres
        );
        
        // Merge
        $viewModel=$getMovies; //-toJson();
        //$viewModel = (object)$viewModel;
        //dd($viewModel);

        return view('filmes.filmes', $viewModel);
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