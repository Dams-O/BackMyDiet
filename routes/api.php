<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::get('/getUsers', 'UserController@getAllUsers');
Route::post('/getUser', 'UserController@getUser');
Route::post('/getUserById', 'UserController@getUserById');

Route::get('/getStats', 'Stats\StatsController@getStats');
Route::get('/getAllStats', 'Stats\StatsController@getAllStats');
Route::post('/getStatsById', 'Stats\StatsController@getStatsById');


Route::group(['prefix' => 'stats'], function () {
    Route::get('getMenu', 'Stats\MenuController@getMenu');
    Route::post('setMenu', 'Stats\MenuController@setMenu');
});

Route::group(['prefix' => 'mess'], function () {
    Route::get('getMessage', 'Stats\MessageController@getMessage');
    Route::post('setMessage', 'Stats\MessageController@setMessage');
});

Route::group(['prefix' => 'conv'], function () {
    Route::get('getConversation', 'Stats\ConversationController@getConversation');
    Route::post('setConversation', 'Stats\ConversationController@setConversation');
});

Route::group(['prefix' => 'donneesuiv'], function () {
    Route::get('getDonneeSuivi', 'Stats\DonneeSuiviController@getDonneeSuivi');
    Route::post('setDonneeSuivi', 'Stats\DonneeSuiviController@setDonneeSuivi');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('getUser', 'Auth\UserController@getUser');
    Route::post('setUser', 'Auth\UserController@setUser');
});