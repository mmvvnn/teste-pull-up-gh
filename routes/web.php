<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::resource('products', 'ProductController');
*/

/*Route::get('/redir', function () {
    return redirect()->route('admin.categorias');
})->middleware('auth');
*/

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin'
], function () {
    Route::get('/', function () {
        return 'Dashboard';
    })->name('admin.dashboard');
    Route::get('/generos', function () {
        return 'Generos';
    })->name('admin.generos');
    Route::get('/tipo', function () {
        return 'Tipo (Serie, Filme, Episodio)';
    })->name('admin.tipo');
    Route::get('/titulos', function () {
        return 'Titulos';
    })->name('admin.titulos');
    Route::get('/config', function () {
        return 'Configuracoes';
    })->name('admin.config');
});

/*Route::get('/', function () {
    return view('welcome');
})->name('front.home');
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('front.home');
Route::match(['post', 'get'], '/busca/{query?}', 'BuscaController@index')->name('front.busca');
Route::get('/generos/{id?}', 'GenerosController@index')->name('front.generos');
Route::get('/filmes/{id?}', 'TitulosController@filmes')->name('front.filmes');
Route::get('/series/{id?}', 'TitulosController@series')->name('front.series');
Route::get('/episodios/{id?}/{idSerie}', 'TitulosController@episodios')->name('front.episodios');
/*Route::get('/atores/{id?}', 'AtoresController@index')->name('front.atores');
Route::get('/noticias/{id?}', 'NoticiasController@index')->name('front.noticias');
*/