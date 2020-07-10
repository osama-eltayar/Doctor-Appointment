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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

// Patient profile data
Route::group([
    'prefix' => 'profile',
    'middleware' => ['auth','role:patient'],
], function () {
    Route::get('/edit', 'Auth\ProfileController@edit');
    Route::Post('/update', 'Auth\ProfileController@update')->name('update-profile');
});

/** apointments page routes */
Route::group([
    'prefix' => 'appointments',
    'middleware' => ['patient','auth:admin,web']
], function () {
    Route::resource('', 'AppointmentController')->only([
    'store', 'edit', 'update', 'index'
    ])->middleware(['patient','auth:admin,web']);
    // accept or reject appointments
    Route::Put('/{appointment}/change', 'AppointmentController@change');
});



// Route::get('/home', 'HomeController@index')->name('home');
