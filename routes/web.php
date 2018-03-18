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

Route::get('/', function () {

	$people = ['Mitesh','Neha'];

    return view('welcome', compact('people'));
});

Route::get('/about', function(){
	
	return view('pages.about');
});

Route::get('/page/about','PagesController@about');

Route::get('/cards/index', 'CardsController@index');

Route::get('cards/{card}', 'CardsController@show');

Route::post('cards/{card}/notes', 'NotesController@store');

Route::post('cards', 'CardsController@create');

Route::get('notes/{note}/edit', 'NotesController@edit');

Route::put('notes/{note}', 'NotesController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
