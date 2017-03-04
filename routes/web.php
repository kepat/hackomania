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

// Sessions Routing
Route::resource('sessions', 'SessionsController', ['only' => ['store']]);
Route::get('/login', ['as' => 'sessions.create', 'uses' => 'SessionsController@create']);
Route::get('/logout', ['as' => 'sessions.destroy', 'uses' => 'SessionsController@destroy']);

Route::group(['middleware' => ['auth']], function () {

    // Home Routing
    Route::get('/', 'DashboardsController@index');
    Route::get('/redirect', 'DashboardsController@redirect');

});