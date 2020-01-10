<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('welcome');

});

Route::get('viewDashboard', 'UserController@viewDashboard');
Route::get('viewDashboard/{nom}', 'UserController@viewDashboardFiltre');
Route::get('viewProfilStats/{id}', 'Stats\StatsController@viewProfilStats');
Route::get('viewProfilStats/{id}', 'Stats\StatsController@getStats');
Route::get('login', 'ConnexionController@login');
Route::post('auth', 'ConnexionController@auth');
Route::get('logout', 'ConnexionController@logout');


