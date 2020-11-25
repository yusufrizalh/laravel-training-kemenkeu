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

// Route::get('/', function () {   // halaman paling depan
//     return view('welcome');
//     return '<h1>Halaman Home</h1>';
// });

// Route::get('/kontak', function () { // halaman kontak 
//     return '<h1>Halaman Kontak</h1>';
// });

// Route::get('/galeri', function () { // halaman galeri 
//     return '<h1>Halaman Galeri</h1>';
// });

// Route::get('/', function () {
//     $nama = request('nama');
//     return view('home', ['nama' => $nama]);
//     return "Nama saya adalah " . htmlspecialchars($nama); 
//     return "Nama saya adalah " . $nama; 
// });

Route::get('/', 'HomeController@index');

Route::get('/posts', 'PostController@index');

// Route::get('/posts/{slug}', 'PostController@show'); // route wildcard 
// Route::get('/posts/{post}', 'PostController@show'); // passing ID 
Route::get('/posts/create', 'PostController@create');   // membuka form new post 
Route::post('/posts/store', 'PostController@store');     // memproses menyimpan new post 
Route::get('/posts/{post:slug}/edit', 'PostController@edit');   // membuka form edit post 
Route::patch('/posts/{post:slug}/edit', 'PostController@update'); // mengedit sebagian kolom 
// Route::put();   // mengedit seluruh kolom 
Route::delete('/posts/{post:slug}/delete', 'PostController@destroy'); // memproses hapus post 

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
