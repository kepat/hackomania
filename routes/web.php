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

// Signup Routing
Route::get('/signup', 'UsersController@create')->name('users.create');
Route::resource('users', 'UsersController', ['only' => ['store']]);

Route::group(['middleware' => ['auth']], function () {

    // Dashboard Routing
    Route::get('/', 'DashboardsController@index')->name('dashboard');
    Route::get('/redirect', 'DashboardsController@redirect');
    Route::get('/facebook', 'DashboardsController@facebook')->name('facebook');
    Route::get('/instagram', 'DashboardsController@instagram')->name('instagram');
    Route::get('/meetup', 'DashboardsController@meetup')->name('meetup');
    Route::get('/print', 'DashboardsController@printImages')->name('print.images');
    Route::get('/share', 'DashboardsController@share')->name('share');

    // Payment Routing
    Route::get('/print/payments/once', 'PaymentsController@once')->name('payments.once');
    Route::get('/print/payments/monthly', 'PaymentsController@monthly')->name('payments.monthly');

});