<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts/{post_id}/comments', 'CommentController@index')->name('comments.index');
Route::post('posts/{post_id}/comment', 'CommentController@storeComment')->name('comment.store');

// Route::middleware('auth:api')->group( function () {
//     Route::post('posts/{post_id}/comment', 'CommentController@storeComment')->name('comment.store');
// });
