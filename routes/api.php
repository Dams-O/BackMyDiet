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

Route::post('/test',function(){
    var_dump('addad'); 
    return "ok"; 
});

Route::post('/login', 'LoginController@login');

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

Route::group(['prefix' => 'utilisateur'], function () {
    Route::get('getUtilisateur', 'Auth\UtilisateurController@getUtilisateur');
    Route::post('setUtilisateur', 'Auth\UtilisateurController@setUtilisateur');
});