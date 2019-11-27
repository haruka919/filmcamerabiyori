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

Route::get('/', 'PostsController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ユーザー編集画面
Route::get('/users/edit', 'UsersController@edit');
// ユーザー更新画面
Route::post('/users/update', 'UsersController@update');
// ユーザー詳細画面
Route::get('/users/{user_id}', 'UsersController@show');

// タグ一覧画面
Route::get('/tags/search', 'TagsController@search')->name('search');

// 新規登録画面
Route::get('/posts/new', 'PostsController@new')->name('new');
// 投稿新規処理
Route::post('/posts','PostsController@store');
// 投稿詳細画面
Route::get('/posts/{post_id}', 'PostsController@show');
// 投稿削除機能
Route::get('/posts/delete/{post_id}', 'PostsController@destroy');

//タグ絞り込み一覧
Route::get('/posts/{tag_id}/tag', 'PostsController@showByTag');

// いいねの処理
Route::get('/posts/{post_id}/likes', 'LikesController@store');
// いいねの削除処理
Route::get('/likes/{like_id}', 'LikesController@destroy');

// いいね一覧
Route::get('/likes', 'LikesController@index')->name('favorite');;
