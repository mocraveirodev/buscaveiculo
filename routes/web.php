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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(["register" =>  false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('search', 'SearchController')->middleware('auth');

// Route::group(['middleware' => 'auth'], function(){
//     Route::get('/capturar', 'SearchController@capturar')->name('capturar');
//     Route::post('/capturar', 'SearchController@buscar')->name('buscar');
//     Route::get('/exibir', 'SearchController@exibir')->name('exibir');
//     Route::delete('/excluir/{id}', 'SearchController@excluir')->name('excluir');
// });