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

Route::get('logout', 'HomeController@logout')->name('logout');

Route::group(['prefix' => 'categories'], function() {
    Route::get('', 'CategoryController@index')->name('categories.index')->middleware('auth');
    Route::get('novo', 'CategoryController@create')->name('categories.create');
    Route::post('novo', 'CategoryController@store')->name('categories.save');
    Route::put('{id}', 'CategoryController@update')->name('categories.update');
    Route::get('{id}', 'CategoryController@edit')->name('categories.edit');
    Route::delete('{id}', 'CategoryController@destroy')->name('categories.destroy');
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('', 'PostController@index')->name('posts.index');
    Route::get('novo', 'PostController@create')->name('posts.create');
    Route::get('{id}', 'PostController@edit')->name('posts.edit');
    Route::delete('{id}', 'PostController@destroy')->name('posts.destroy');
    Route::post('novo', 'PostController@store')->name('posts.save');
    Route::put('{id}', 'PostController@update')->name('posts.update');
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

Route::get('/home', 'HomeController@index')->name('home');
