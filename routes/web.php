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


Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
// Route::get('/pages/create', 'PagesController@create');
// Route::post('/pages', 'PagesController@store');

Route::resource('/pages', 'PagesController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/posts','PostsController');

Route::post('/posts/{post}/comment/store', 'CommentController@store')->name('comment.store');

Route::delete('/posts/{post}/comment/{comment}', 'CommentController@destroy')->name('comment.destroy');
