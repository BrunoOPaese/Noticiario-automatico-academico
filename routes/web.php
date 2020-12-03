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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', 'HomeController@index')->name('index');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::group(['prefix' => 'categories'], function() {
    Route::get('', 'CategoryController@index')->name('categories.index')->middleware('auth');
    Route::get('novo', 'CategoryController@create')->name('categories.create')->middleware('auth');
    Route::post('novo', 'CategoryController@store')->name('categories.save')->middleware('auth');
    Route::put('{id}', 'CategoryController@update')->name('categories.update')->middleware('auth');
    Route::get('{id}', 'CategoryController@edit')->name('categories.edit')->middleware('auth');
    Route::delete('{id}', 'CategoryController@destroy')->name('categories.destroy')->middleware('auth');
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('', 'PostController@index')->name('posts.index')->middleware('auth');
    Route::get('novo', 'PostController@create')->name('posts.create')->middleware('auth');
    Route::get('{id}', 'PostController@edit')->name('posts.edit')->middleware('auth');
    Route::delete('{id}', 'PostController@destroy')->name('posts.destroy')->middleware('auth');
    Route::post('novo', 'PostController@store')->name('posts.save')->middleware('auth');
    Route::put('{id}', 'PostController@update')->name('posts.update')->middleware('auth');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('', 'UserController@index')->name('users.index')->middleware('auth');
    Route::get('novo', 'UserController@create')->name('users.create')->middleware('auth');
    Route::post('', 'UserController@store')->name('users.store')->middleware('auth');
    Route::get('{id}', 'UserController@edit')->name('users.edit')->middleware('auth');
    Route::put('{id}', 'UserController@update')->name('users.update')->middleware('auth');
    Route::delete('{id}', 'UserController@destroy')->name('users.destroy')->middleware('auth');
});
Auth::routes();