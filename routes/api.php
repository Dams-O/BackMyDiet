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


// -------- FoodLibrary --------

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

// '/api/getAllDataUsersByUser' Retourne toutes les entités DataUsers d'un User
Route::post('/getAllDataUsersByUser', 'DataUserController@getAllDataUsersByUser');
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




// -------- DataUserHasFood --------

// '/api/getAllDataUserHasFood' Retourne toutes les entités DataUserHasFood 
Route::get('/getAllDataUserHasFood', 'DataUserHasFoodController@getAllDataUserHasFood');
// '/api/getDataUserHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::post('/getDataUserHasFoodById', 'DataUserHasFoodController@getDataUserHasFoodById');
// '/api/deleteDataUserHasFood' Supprime une entité MealLibraryHasFood
Route::post('/deleteDataUserHasFood', 'DataUserHasFoodController@deleteDataUserHasFood');





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



// -------- MealLibrary --------

// '/api/getAllMeals' Retourne toutes les entités Meal 
Route::get('/getAllMeals', 'MealLibraryController@getAllMeals');
// '/api/getMeal' Retourne une entité Meal 
Route::post('/getMeal', 'MealLibraryController@getMeal');
// '/api/getMealById' Retourne une  entité Meal en renseignant son ID
Route::post('/getMealById', 'MealLibraryController@getMealById');
// '/api/createMeal' Crée une entité Meal
Route::post('/createMeal', 'MealLibraryController@createMeal');
// '/api/deleteMeal' Supprime une entité Meal
Route::post('/deleteMeal', 'MealLibraryController@deleteMeal');





// -------- MealLibraryHasFood --------

// '/api/getAllMealLibraryHasFood' Retourne toutes les entités MealLibraryHasFood 
Route::get('/getAllMealLibraryHasFood', 'MealLibraryHasFoodController@getAllMealLibraryHasFood');
// '/api/getMealLibraryHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::post('/getMealLibraryHasFoodById', 'MealLibraryHasFoodController@getMealLibraryHasFoodById');
// '/api/deleteMealLibraryHasFood' Supprime une entité MealLibraryHasFood
Route::post('/deleteMealLibraryHasFood', 'MealLibraryHasFoodController@deleteMealLibraryHasFood');





// -------- Recipe --------

// '/api/getAllRecipes' Retourne toutes les entités Recipe 
Route::get('/getAllRecipes', 'RecipeController@getAllRecipes');
// '/api/getRecipe' Retourne une entité Recipe 
Route::post('/getRecipe', 'RecipeController@getRecipe');
// '/api/getRecipeById' Retourne une  entité Recipe en renseignant son ID
Route::post('/getRecipeById', 'RecipeController@getRecipeById');
// '/api/createRecipe' Crée une entité Recipe
Route::post('/createRecipe', 'RecipeController@createRecipe');
// '/api/deleteRecipe' Supprime une entité Recipe
Route::post('/deleteRecipe', 'RecipeController@deleteRecipe');



// -------- RecipeHasFood --------

// '/api/getAllRecipeHasFood' Retourne toutes les entités RecipeHasFood 
Route::get('/getAllRecipeHasFood', 'RecipeHasFoodController@getAllRecipeHasFood');
// '/api/getRecipeHasFoodById' Retourne une  entité RecipeHasFood en renseignant son ID
Route::post('/getRecipeHasFoodById', 'RecipeHasFoodController@getRecipeHasFoodById');
// '/api/deleteRecipeHasFood' Supprime une entité RecipeHasFood
Route::post('/deleteRecipeHasFood', 'RecipeHasFoodController@deleteRecipeHasFood');






// -------- Advice --------

// '/api/getAllAdvices' Retourne toutes les entités Advice 
Route::get('/getAllAdvices', 'AdviceController@getAllAdvices');
// '/api/getAdvice' Retourne une entité Advice 
Route::post('/getAdvice', 'AdviceController@getAdvice');
// '/api/getAdviceById' Retourne une  entité Advice en renseignant son ID
Route::post('/getAdviceById', 'AdviceController@getAdviceById');
// '/api/createAdvice' Crée une entité Advice
Route::post('/createAdvice', 'AdviceController@createAdvice');
// '/api/deleteAdvice' Supprime une entité Advice
Route::post('/deleteAdvice', 'AdviceController@deleteAdvice');




// -------- RecipeSteps --------

// '/api/getAllRecipeSteps' Retourne toutes les entités RecipeSteps 
Route::get('/getAllRecipeSteps', 'RecipeStepsController@getAllRecipeSteps');
// '/api/getRecipeSteps' Retourne une entité RecipeSteps 
Route::post('/getRecipeSteps', 'RecipeStepsController@getRecipeSteps');
// '/api/getRecipeStepsById' Retourne une  entité RecipeSteps en renseignant son ID
Route::post('/getRecipeStepsById', 'RecipeStepsController@getRecipeStepsById');
// '/api/createRecipeSteps' Crée une entité RecipeSteps
Route::post('/createRecipeSteps', 'RecipeStepsController@createRecipeSteps');
// '/api/deleteRecipeSteps' Supprime une entité RecipeSteps
Route::post('/deleteRecipeSteps', 'RecipeStepsController@deleteRecipeSteps');



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