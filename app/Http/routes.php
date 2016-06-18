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
Route::get('admin', 'Controller@index')->middleware(['admin']);

Route::resource('authors', 'AuthorsController');

Route::resource('books', 'BooksController');


Route::group(['middleware' => ['web']], function(){
    Route::get('books/{book}/reviews', 'ReviewController@getIndex');
    Route::post('books/{book}/reviews', 'ReviewController@postReview');
    Route::delete('books/{book}/reviews', 'ReviewController@destroy');

});


Route::get('genres', 'GenresController@index');
Route::get('genres/{id}', 'GenresController@show');

Route::auth();
