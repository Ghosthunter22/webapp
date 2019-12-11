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
    return view('welcome');  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');
Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');

Route::get('comments', 'CommentController@index')->name('comments.index');
Route::get('comments/create', 'CommentController@create')->name('comments.create');
Route::post('comments', 'CommentController@store')->name('comments.store');
Route::get('comments/{comment}', 'CommentController@show')->name('comments.show');
Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
