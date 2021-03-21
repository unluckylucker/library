<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api'], function (){
    Route::get('/getBooks', 'RestApi\BookController@getList')->name('bookList');
    Route::get('/getAuthors', 'RestApi\AuthorController@getList')->name('authorList');
    Route::post('/rateBook', 'Auth\RatingBook@index')->name('rate');
    Route::post('/rateAuthor', 'Auth\RatingAuthor@index')->name('rateAuthors');
    Route::get('/search', 'RestApi\MainController@search')->name('search');
});

Route::get('/link', 'RestApi\LinkGeneratorController@generateLink')->name('linkGenerator');

