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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/','ApartmentController@index')->name('index');
        /* Route::resource('/posts', PostsController::class); */
        Route::resource('/apartments', ApartmentController::class);
    });

Route::get('{any?}', function (){
    return view('guest.home');
})->where("any",".*");

/* Route::resource('Apartment', ApartmentController::class);
 */
