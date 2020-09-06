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

Route::get(' / ', 'BooksController@index' );

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController', ['only' => ['index', 'show', 'create', 'store', 'edit',  'update', 'destroy']]);
    Route::resource('checklists', 'ChecklistsController', ['only' => ['index', 'show' , 'store' , 'create', 'store']]);
    Route::resource('changes', 'ChangesController', ['only' => ['show','create', 'store', 'edit', 'destroy']]);
    Route::get('newbooks', 'BooksController@index2')->name('newbooks.index2');
});