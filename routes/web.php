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

Route::get('/', 'BlogController@index');
Route::get('/list', 'BlogController@lists')->middleware('auth');
Route::get('/create', 'BlogController@create')->middleware('auth');
Route::post('/save', 'BlogController@store')->name('save');
Route::get('/blog/{slug}', 'BlogController@show')->name('blog');
Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
Route::post('/update{id}', 'BlogController@update')->name('update');
Auth::routes(['verify' => true]);
Route::post('/com/store', 'CommentController@store')->name('com.store');
Route::get('/home', 'HomeController@index')->name('home');
