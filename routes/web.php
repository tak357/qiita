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

Route::get('/', 'Auth\PostsController@showTopPage')->name('top');

Auth::routes();

//Route::get('/login','Auth\AuthenticatesUsers@showLoginForm')->name('login');

Route::get('/drafts/new', 'Auth\PostsController@index')->name('drafts.new');
Route::post('/drafts/new', 'Auth\PostsController@postArticle')->name('drafts.new.posts');
Route::get('/drafts/{id}', 'Auth\PostsController@showArticle')->name('item');
Route::get('/drafts/{post}/edit', 'Auth\PostsController@edit');
Route::patch('/drafts/{post}', 'Auth\PostsController@update');
Route::delete('/drafts/{post}', 'Auth\PostsController@destroy');
Route::get('/search', 'Auth\PostsController@search')->name('search');
Route::post('/search', 'Auth\PostsController@searchResult');

// イイネ機能
Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');

// ユーザー情報 2019/12/27
Route::get('/user', 'Auth\UsersController@index');
Route::get('/user/edit-name', 'Auth\UsersController@editName');
Route::post('/user/edit-name', 'Auth\UsersController@updateName');
Route::get('/user/edit-mail', 'Auth\UsersController@editMail');
Route::post('/user/edit-mail', 'Auth\UsersController@updateMail');
Route::get('/user/edit-password', 'Auth\UsersController@editPassword');
Route::post('/user/edit-password', 'Auth\UsersController@updatePassword');

Route::post('/user', 'Auth\UsersController@store');
