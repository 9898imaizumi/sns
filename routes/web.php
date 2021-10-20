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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::get('/top','PostsController@posts');
Route::post('posts/create', 'PostsController@create');
Route::post('posts/update', 'PostsController@update');
Route::get('post/{id}/delete', 'PostsController@delete');

Route::get('users/profile','UsersController@profile');
Route::post('users/profile/update','UsersController@update');
Route::get('users/{id}/otherProfile','UsersController@otherProfile');
Route::get('users/{id}/other_searchFollow','UsersController@other_searchFollow');
Route::get('users/{id}/other_searchFollow_del','UsersController@other_searchFollow_del');

Route::get('users/search','UsersController@search');
Route::post('users/searchResult','UsersController@searchResult');
Route::get('users/{id}/searchFollow','UsersController@searchFollow');
Route::get('users/{id}/searchFollow_del','UsersController@searchFollow_del');


Route::get('follows/followList','FollowsController@followList');
Route::get('follows/followerList','FollowsController@followerList');

Route::get('/logout','Auth\LoginController@logout');
