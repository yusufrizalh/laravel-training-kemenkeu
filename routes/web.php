<?php

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

Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('/', 'PostController@index');
    Route::get('create', 'PostController@create');   // membuka form new post 
    Route::post('store', 'PostController@store');     // memproses menyimpan new post 
    Route::get('{post:slug}/edit', 'PostController@edit');   // membuka form edit post 
    Route::patch('{post:slug}/edit', 'PostController@update'); // mengedit sebagian kolom 
    // Route::put();   // mengedit seluruh kolom 
    Route::delete('{post:slug}/delete', 'PostController@destroy'); // memproses hapus post
});

Route::get('/categories/{category:slug}', 'CategoryController@show');    // memfilter category
Route::get('/tags/{tag:slug}', 'TagController@show');
Route::get('/posts/{post:slug}', 'PostController@show'); // passing slug 

Route::view('/kontak', 'kontak');
Route::view('/galeri', 'galeri');
Route::view('/login', 'login');

// cara mengakses route view dari dalam subfolder
Route::view('/series/create', 'series/create');
Route::view('/series/delete', 'series/delete');
Route::view('/series/edit', 'series/edit');
Route::view('/series/index', 'series/index');
Route::view('/series/show', 'series/show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
