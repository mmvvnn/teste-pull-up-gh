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

/*------------------------
Painel do Administrador
--------------------------*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth','role:admin']], function() {
    Route::get('/', 'AdminController@dashboard')->name('admin.index');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/role/{id?}', 'AdminController@changeRole')->name('admin.role');
    Route::get('/user/delete/{id?}', 'AdminController@deleteUser')->name('admin.user.delete');
    Route::get('/review', 'AdminController@setting')->name('admin.review');
    Route::post('/review', 'AdminController@updateReview')->name('admin.review.update');
    Route::get('/settings', 'SettingsController@setting')->name('admin.settings');
    Route::post('/settings', 'SettingsController@updateSetting')->name('admin.settings.update');
});

/*--------------------------------------
Autenticacao com verificacao de E-mail
---------------------------------------*/
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('register.home');

/*------------------------
Index e Filmes
--------------------------*/
Route::get('/filmes', 'FilmesController@index')->name('filmes.all.index');
Route::get('/', 'FilmesController@index')->name('filmes.index');
Route::get('/filmes/{id}', 'FilmesController@show')->name('filmes.show');
Route::get('/novidades', 'NewsController@index')->name('news.index');;

/*------------------------
Atores
--------------------------*/
Route::group([
    'prefix' => 'atores'
], function () {
    Route::get('/', 'AtoresController@index')->name('atores.index');
    Route::get('/pagina/{page?}', 'AtoresController@index')->name('atores.page');
    Route::get('/{id}', 'AtoresController@show')->name('atores.show');
});

/*------------------------
Series de TV
--------------------------*/
Route::group([
    'prefix' => 'tv'
], function () {
    Route::get('/', 'TvController@index')->name('tv.index');
    Route::get('/{id}', 'TvController@show')->name('tv.show');
});

/*------------------------
Pagina Estatica Sobre
--------------------------*/
Route::get('sobre', 'HomeController@about')->name('about');;

/*------------------------
Painel do Usuario
--------------------------*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('/assistir', 'ListsController@watchlist')->name('user.watchlist');
    Route::get('/favoritos', 'ListsController@favourite')->name('user.favourite');

    /* Avaliacoes */
    Route::post('/review', 'ReviewsController@review')->name('user.review');
    Route::post('update/review', 'ReviewsController@updateReview')->name('user.update.review');
    Route::get('delete/review/{id}', 'ReviewsController@deleteReview')->name('user.delete.review');

    /* Configuracoes */
    Route::get('/user/{username}', 'SettingsController@profile')->name('user.view');
    Route::get('/settings', 'SettingsController@settings')->name('user.manage');
    Route::post('/settings', 'SettingsController@updateSettings')->name('user.manage.update');
    Route::get('/settings/password', 'SettingsController@passwordSettings')->name('user.password');
    Route::post('/settings/password', 'SettingsController@updatePassword')->name('user.update.password');
    Route::get('/delete/account', 'SettingsController@deleteAccount')->name('user.delete');
});




/*
Route::resource('products', 'ProductController');

Route::get('/redir', function () {
    return redirect()->route('admin.categorias');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
})->name('front.home');
*/