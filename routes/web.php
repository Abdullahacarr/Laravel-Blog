<?php

use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\Category;

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
Route::get('/kategori/{category}/','App\Http\Controllers\HomePageController@categori')->name('category');
Route::get('/', 'App\Http\Controllers\HomePageController@index')->name('homepage');
Route::get('/{category}/{post}','App\Http\Controllers\HomePageController@post')->name('post');
Route::post('/{category}/{post}','App\Http\Controllers\HomePageController@commentAdd')->name('comment');



