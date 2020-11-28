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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('', 'CategoryController@index')->name('categories.index');
    Route::get('novo', 'CategoryController@create')->name('categories.create');
    Route::post('novo', 'CategoryController@store')->name('categories.save');
    Route::put('{id}', 'CategoryController@update')->name('categories.update');
    Route::get('{id}', 'CategoryController@edit')->name('categories.edit');
    Route::delete('{id}', 'CategoryController@destroy')->name('categories.destroy');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
