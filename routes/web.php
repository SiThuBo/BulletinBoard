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

Route::get("posts/postdetail/{id}", "PostController@postdetail")->name('posts.postdetail');

Route::post("posts/create", "PostController@create")->name('posts.create');

Route::get("posts/update", "PostController@update")->name('posts.update');

Route::post("posts/search", 'PostController@search');

Route::post("posts/import", "PostController@fileImport")->name('posts.import');

Route::get('file-export', 'PostController@fileExport')->name('file-export');

// Route::post("posts/update_confirm", "PostController@update_confirm")->name('posts.update_confirm');

Route::post("posts/store", "PostController@store")->name('posts.store');

Route::get('/posts/createPost', function () {
    return view('posts/createPost');
});

Route::get('/posts/update_post', function () {
    return view('posts/update_post');
});

Route::get('/posts/uploadCSV', function () {
    return view('posts/uploadCSV');
});

Route::resource("posts", "PostController");

//User
Route::post("users/search", 'UserController@search');

Route::get('/users/createUser', function () {
    return view('users/createUser');
});

Route::post("users/create", "UserController@create")->name('users.create');

// Route::post('users/update_confrim', "UserController@confirm_update")->name('users.confirm_update');

//to see changePassword view
Route::get('/users/changePassword', function () {
    return view('users/changePassword');
});

Route::post("users/changePassword", "UserController@changepassword")->name('users.changepassword');

Route::resource("users", "UserController");



