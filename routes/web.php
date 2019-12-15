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

Route::get('home', 'HomeController@index')->name('home');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile', 'ProfileController@update_avatar')->name('profile.update_avatar');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/{id}', 'UserController@show')->name('users.show');

Route::get('groups', 'GroupController@index')->name('groups.index');
Route::get('groups/{group_id}', 'GroupController@show')->name('groups.show');

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{post_id}', 'PostController@show')->name('posts.show');
Route::delete('posts/{post_id}', 'PostController@destroy')->name('posts.destroy');

Route::get('comments/{post_id}', 'CommentController@index')->name('comments.index');
Route::get('comments/{post_id}/create', 'CommentController@create')->name('comments.create');
Route::post('comments', 'CommentController@store')->name('comments.store');
Route::get('comments/{id}', 'CommentController@show')->name('comments.show');
Route::delete('posts/{post_id}/comments/{comment_id}', 'CommentController@destroy')->name('comments.destroy');