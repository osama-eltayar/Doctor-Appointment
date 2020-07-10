<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
*/
Route::post('/login', 'AdminController@login')->name('admin-login')->middleware(['guest:admin','guest']);
Route::get('/login', 'AdminController@login')->middleware(['guest:admin','guest']);
Route::post('/logout', 'AdminController@logout')->middleware('auth:admin')->name('admin-logout');
