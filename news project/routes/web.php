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


//pasidaryti homepage, kad rodytų index failiuką
Route::get('/', 'NewsController@index')->name('homepage');

Auth::routes();


Route::get('naujienos/autorius/{id}', 'NewsController@authorIndex')->name('news.author');


Route::resource('news', 'NewsController');
Route::resource('comments', 'CommentController');
Route::resource('categories', 'CategoryController');


Route::get('search', 'SearchController@index')->name('search');


Route::get('/home', 'HomeController@index')->name('home');
