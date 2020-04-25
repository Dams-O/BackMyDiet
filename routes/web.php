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

use App\Http\Controllers\InscriptionController;

Route::get('/', function () {

    if (!Auth::check()){
        return view('front/login');
        }
    else{
        return view('welcome');
    }
});

Route::get('viewDashboard', 'UserController@viewDashboard');
Route::get('viewDashboard/{nom}', 'UserController@viewDashboardFiltre');
Route::get('viewProfilStats/{id}', 'Stats\StatsController@viewProfilStats');
Route::get('viewProfilStats/{id}', 'Stats\StatsController@getStats');
Route::post('auth', 'ConnexionController@auth');
Route::get('logout', 'ConnexionController@logout');
Route::get('form', 'InscriptionController@form');
Route::post('register', 'InscriptionController@register');
Route::get('addFood', 'MealLibraryController@addFoodPage');
Route::post('foodCompletion', 'MealLibraryController@search');
Route::get('addRecette', 'RecetteController@showPage');

