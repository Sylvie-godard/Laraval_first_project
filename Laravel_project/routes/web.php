<?php

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
// Route::name('language')->get('language/{lang}', 'HomeController@language');
Route::get('/', function () {
    return view('home');
});


Route::get('/profil', function () {
    return view('profile');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/match/create', 'MatchController@create')->middleware('admin');
Route::post('/match/pariStore', 'MatchController@pariStore')->name('match.pariStore')->middleware('auth');
Route::get('/match/{match}/pari', 'MatchController@pari')->name('match.pari')->middleware('auth');
Route::get('/match/stats', 'MatchController@stats');
Route::get('/match/paris', 'MatchController@paris')->middleware('admin');
Route::resource('/team', 'TeamController');
Route::resource('/user', 'UserController')->middleware('admin');
Route::resource('/image', 'ImageController');
Route::resource('/player', 'PlayerController');
Route::resource('/match', 'MatchController');
Route::resource('/pari', 'PariController')->middleware('auth');