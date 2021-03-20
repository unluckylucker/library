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
Auth::routes(['reset'=>false]);
Route::get('/', 'MainController@index')->name('index');
Route::post('/search/', 'MainController@search')->name('search');
Route::post('/sort/', 'MainController@sort')->name('sort');

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::group(['middleware'=>'auth'], function (){
    Route::post('/ajax/rate', 'Auth\RatingBook@index')->name('rate');
    Route::post('/ajax/rateAuthors', 'Auth\RatingAuthor@index')->name('rateAuthors');
    Route::group(['middleware'=>'is_admin'], function (){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('book', 'Admin\BookController');
        Route::resource('author', 'Admin\AuthorController');
    });

});








