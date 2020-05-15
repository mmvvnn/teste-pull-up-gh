<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\AtorViewModel;
use App\ViewModels\AtoresViewModel;
use Illuminate\Support\Facades\Http;

class AtoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $popularActors = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page='.$page.'&language=pt-BR')
            ->json()['results'];

        $viewModel = new AtoresViewModel($popularActors, $page);

        return view('atores.index', $viewModel);
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
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'?language=pt-BR')
            ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits?language=pt-BR')
            ->json();

        $images = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/images')
            ->json()['profiles'];

        $viewModel = new AtorViewModel($actor, $social, $credits, $images);

        return view('atores.show', $viewModel);
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
