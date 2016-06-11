<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Controller@index');

Route::resource('authors', 'AuthorsController');
Route::resource('books', 'BooksController');

Route::get('genres', 'GenresController@index');
Route::get('genres/{id}', 'GenresController@show');

Route::auth();
