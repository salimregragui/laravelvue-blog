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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

	Route::get('posts/{Post}/kill','PostsController@kill')->name('posts.kill');

	Route::get('/posts/trashed','PostsController@trashed')->name('posts.trashed');

	Route::resource('posts','PostsController');

	Route::resource('categories','CategoriesController');

});