<?php


use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagController');
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');
    
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
    Route::put('restore-post/{id}', 'PostController@restore')->name('restore-post');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('users-list', 'UserController@index')->name('users.index');
});