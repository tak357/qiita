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

Route::get('/drafts/new', 'Auth\PostsController@index')->name('drafts.new');
Route::post('/drafts/new', 'Auth\PostsController@postArticle')->name('drafts.new.posts');

Route::get('/drafts/{id}', 'Auth\PostsController@showArticle')->name('item');

Route::get('/search', 'Auth\PostsController@search')->name('search');
Route::post('/search', 'Auth\PostsController@searchResult');

Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');

//Route::get('/home', 'HomeController@index')->name('home');
