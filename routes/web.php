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


Route::get('/', 'PagesController@home')->name('home');
// Route::get('/about', 'PagesController@about');
// Route::get('/services', 'PagesController@services');
// Route::get('/pages/create', 'PagesController@create');
// Route::post('/pages', 'PagesController@store');

Auth::routes();

//PAGES
Route::resource('/pages', 'PagesController');
Route::get('/pages/{page}/delete', 'PagesController@delete')->name('pages.delete'); // Deleting Confirmation

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// POSTS
// Route::resource('/posts','PostsController');
Route::resource('/posts','PostsController', ['except' => [
	'show',
	]]);
Route::get('/posts/{post}/delete', 'PostsController@delete')->name('posts.delete'); // Deleting Confirmation
Route::get('/posts/user/{username}', 'PostsController@userPosts')->name('user.posts'); // To show posts for a user
Route::get('/posts/{id}/{title}', 'PostsController@show')->name('posts.show');	// Show posts with id/title URL
Route::get('/search', 'PostsController@search')->name('search');


Route::post('/posts/{id}/comment/store', 'CommentController@store')->name('comment.store');

Route::delete('/posts/{id}/comment/{comment}', 'CommentController@destroy')->name('comment.destroy');


// PROFILE
Route::get('/user/profile/{profile}', 'ProfileController@index' )->name('user.profile');

Route::put('/user/profile/{profile}/update' , 'ProfileController@update')->name('profile.update');