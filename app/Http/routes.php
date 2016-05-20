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

Route::get('books', 'BooksController@index');
Route::get('books/add', 'BooksController@add');
Route::get('books/{id}', 'BooksController@show');
Route::post('books', 'BooksController@store');

Route::get('about', 'PagesController@about');

Route::auth();
Route::get('/home', 'HomeController@index');
