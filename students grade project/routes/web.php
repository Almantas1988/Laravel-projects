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

Route::get('/', 'HomeController@index')->name('login');

Auth::routes();

Route::resource('students', 'StudentsController');
Route::resource('lectures', 'LecturesController');
Route::resource('grades', 'GradesController');

Route::get('/home', 'HomeController@index')->name('home');
