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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => 'auth'], function () {

    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::any('/post/store', 'PostsController@store')->name('post.store');
    Route::any('/posts', 'PostsController@index')->name('posts');

//categories 
    Route::any('/category/create', 'CategoryController@create')->name('category.create');
    Route::any('/category/store', 'CategoryController@store')->name('category.store');
    Route::any('/categories', 'CategoryController@index')->name('categories');
    Route::any('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::any('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
    Route::any('/category/update/{id}', 'CategoryController@update')->name('category.update');



});