<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::post('login', 'Auth\LoginController@login');

Route::get("posts/index", "PostController@index")->name('posts.index');

Route::post("posts/create", "PostController@create")->name('posts.create');

Route::post("posts/update", "PostController@update")->name('posts.update');

Route::post("posts/edit", "PostController@edit")->name('posts.edit');

Route::post("posts/create_confirm", "PostController@create_confirm")->name('posts.create_confirm');

Route::post("posts/update_confirm", "PostController@update_confirm")->name('posts.update_confirm');

Route::post("posts/store", "PostController@store")->name('posts.store');

Route::get('/posts/createPost', function () {
    return view('posts/createPost');
});

Route::get('/posts/update_confirm', function () {
    return view('posts/update_confirm');
});


Route::resource("posts", "PostController");



