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


Route::namespace('Api')
->prefix('/apartments')
->group(function(){
   Route::get( '/', 'ApartmentApi@index');
   Route::get( '/{id}', 'ApartmentApi@show');
});

// Route::get( '/api/filtered/', 'SearchApi@index');

Route::namespace('Api')
->prefix('/filtered')
->group(function(){
    Route::get( '/', 'SearchApi@index');
});

Route::namespace('Api')
->prefix('/message')
->group(function(){
    Route::get( '/', 'MessageApi@store');
});


Route::namespace('Api')
->prefix('/view')
->group(function(){
    Route::get( '/', 'ViewApi@store');
});

