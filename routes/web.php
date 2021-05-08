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

Route::get('lang/{locale}', 'App\Http\Controllers\LocalizationController@index');

//pages
Route::group(['prefix' => 'page'], function () {
    Route::get('ads', 'App\Http\Controllers\MainController@ads')->name('ads');
    Route::get('contacts', 'App\Http\Controllers\MainController@contacts')->name('contacts');
    Route::get('policy', 'App\Http\Controllers\MainController@policy')->name('policy');
    Route::post('feedback', 'App\Http\Controllers\MainController@feedback')->name('feedback');
});


Route::get('/parse','App\Http\Controllers\MainController@parse')->name('parse');
Route::delete('/deleteAllPosts', 'App\Http\Controllers\MainController@deleteAllPosts')->name('delete_all_posts');
Route::delete('/deleteAllSelect', 'App\Http\Controllers\MainController@deleteAllSelect')->name('delete_all_select');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
//    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
//    });
});


Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/tags/{tag}', 'App\Http\Controllers\MainController@tag')->name('tag');
Route::get('/category/{slug}/{post}', 'App\Http\Controllers\MainController@post')->name('post');
Route::get('/category/{slug}', 'App\Http\Controllers\MainController@category')->name('category');
