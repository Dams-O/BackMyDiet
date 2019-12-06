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

Route::post('/login', 'ConnexionController@loginPost');

Route::get('/getAllUsers', 'UserController@getAllUsers');
Route::post('/getUser', 'UserController@getUser');
Route::post('/getUserById', 'UserController@getUserById');
Route::post('/createUser', 'UserController@createUser');
Route::post('/deleteUser', 'UserController@deleteUser');




Route::get('/getAllStats', 'Stats\StatsController@getAllStats');
Route::post('/getStats', 'Stats\StatsController@getStats');
Route::post('/getStatsById', 'Stats\StatsController@getStatsById');
Route::post('/createStats', 'Stats\StatsController@createStats');
Route::post('/deleteStats', 'Stats\StatsController@deleteStats');


Route::get('/getAllFoods', 'FoodLibraryController@getAllFoods');
Route::post('/getFood', 'FoodLibraryController@getFood');
Route::post('/getFoodById', 'FoodLibraryController@getFoodById');
Route::post('/createFood', 'FoodLibraryController@createFood');
Route::post('/deleteFood', 'FoodLibraryController@deleteFood');


Route::get('/getAllDataUsers', 'DataUserController@getAllDataUsers');
Route::post('/getDataUser', 'DataUserController@getDataUser');
Route::post('/getDataUserById', 'DataUserController@getDataUserById');
Route::post('/createDataUser', 'DataUserController@createDataUser');
Route::post('/deleteDataUser', 'DataUserController@deleteDataUser');

Route::get('/getAllDataIcecubes', 'DataIcecubeController@getAllDataIcecubes');
Route::post('/getDataIcecube', 'DataIcecubeController@getDataIcecube');
Route::post('/getDataIcecubeById', 'DataIcecubeController@getDataIcecubeById');
Route::post('/createDataIcecube', 'DataIcecubeController@createDataIcecube');
Route::post('/deleteDataIcecube', 'DataIcecubeController@deleteDataIcecube');

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