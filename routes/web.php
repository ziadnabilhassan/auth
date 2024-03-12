<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PostController@welcome')->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');
//route resources posts
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/postsTrashed', 'PostController@postsTrashed')->name('posts.postsTrashed');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');


//route resources tags
Route::get('/tags', 'TagController@index')->name('tags');
Route::get('/tags/create', 'TagController@create')->name('tag.create');
Route::post('/tags/store', 'TagController@store')->name('tag.store');
Route::get('/tags/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::post('/tags/update/{id}', 'TagController@update')->name('tag.update');
Route::get('/tags/destroy/{id}', 'TagController@destroy')->name('tag.destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
