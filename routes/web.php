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

Route::get('/', 'App\Http\Controllers\MainController@home')->name('welcome');
Route::get('/parse', 'App\Http\Controllers\MainController@index')->name('parse');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
//    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
//    });
});
