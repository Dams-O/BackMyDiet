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





// -------- User --------

// '/api/getAllUsers' Retourne toutes les entités User 
Route::get('/getAllUsers', 'UserController@getAllUsers');
// '/api/getUser' Retourne une entité User 
Route::post('/getUser', 'UserController@getUser');
// '/api/getUserById' Retourne une  entité User en renseignant son ID
Route::post('/getUserById', 'UserController@getUserById');
// '/api/createUser' Crée une entité User
Route::post('/createUser', 'UserController@createUser');
// '/api/deleteUser' Supprime une entité User
Route::post('/deleteUser', 'UserController@deleteUser');



// -------- Stats --------

// '/api/getAllStats' Retourne toutes les entités Stats 
Route::get('/getAllStats', 'Stats\StatsController@getAllStats');
// '/api/getStats' Retourne une entité Stats 
Route::post('/getStats', 'Stats\StatsController@getStats');
// '/api/getStatsById' Retourne une  entité Stats en renseignant son ID
Route::post('/getStatsById', 'Stats\StatsController@getStatsById');
// '/api/createStats' Crée une entité Stats
Route::post('/createStats', 'Stats\StatsController@createStats');
// '/api/deleteStats' Supprime une entité Stats
Route::post('/deleteStats', 'Stats\StatsController@deleteStats');


// -------- Food --------

// '/api/getAllFoods' Retourne toutes les entités Food 
Route::get('/getAllFoods', 'FoodLibraryController@getAllFoods');
// '/api/getFood' Retourne une entité Food 
Route::post('/getFood', 'FoodLibraryController@getFood');
// '/api/getFoodById' Retourne une  entité Food en renseignant son ID
Route::post('/getFoodById', 'FoodLibraryController@getFoodById');
// '/api/createFood' Crée une entité Food
Route::post('/createFood', 'FoodLibraryController@createFood');
// '/api/deleteFood' Supprime une entité Food
Route::post('/deleteFood', 'FoodLibraryController@deleteFood');


// -------- DataUser --------

// '/api/getAllDataUsers' Retourne toutes les entités DataUsers
Route::get('/getAllDataUsers', 'DataUserController@getAllDataUsers');
// '/api/getDataUser' Retourne une entité DataUser
Route::post('/getDataUser', 'DataUserController@getDataUser');
// '/api/getDataUserById' Retourne une entité DataUser en renseignant son ID
Route::post('/getDataUserById', 'DataUserController@getDataUserById');
// '/api/createDataUser' Crée une entité DataUser
Route::post('/createDataUser', 'DataUserController@createDataUser');
// '/api/deleteDataUser' Supprime une entité DataUser
Route::post('/deleteDataUser', 'DataUserController@deleteDataUser');


// -------- DataIceCube --------

// '/api/getAllDataIcecubes' Retourne toutes les entités DataIceCube
Route::get('/getAllDataIcecubes', 'DataIcecubeController@getAllDataIcecubes');
// '/api/getDataIcecube' Retourne une entité DataIceCube
Route::post('/getDataIcecube', 'DataIcecubeController@getDataIcecube');
// '/api/getDataIcecubeById' Retourne une entité DataIceCube en renseignant son ID
Route::post('/getDataIcecubeById', 'DataIcecubeController@getDataIcecubeById');
// '/api/createDataIcecube' Crée une entité DataIceCube
Route::post('/createDataIcecube', 'DataIcecubeController@createDataIcecube');
// '/api/deleteDataIcecube' Supprime une entité DataIceCube
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