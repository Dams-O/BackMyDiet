<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\Stats\StatsController;
use App\Http\Controllers\FoodLibraryController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DataUserHasFoodController;
use App\Http\Controllers\DataIcecubeController;
use App\Http\Controllers\MealLibraryController;
use App\Http\Controllers\MealLibraryHasFoodController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeHasFoodController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\RecipeStepsController;
use App\Http\Controllers\Stats\MessageController;
use App\Http\Controllers\Stats\ConversationController;
use App\Http\Controllers\Stats\MenuController;
use App\Http\Controllers\Stats\DonneeSuiviController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// -------- User --------

// '/api/getAllUsers' Retourne toutes les entités User 
Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);
// '/api/getUser' Retourne une entité User 
Route::post('/getUser', [UserController::class, 'getUser']);
// '/api/getUserById' Retourne une  entité User en renseignant son ID
Route::post('/getUserById', [UserController::class, 'getUserById']);
// '/api/createUser' Crée une entité User
Route::post('/createUser', [UserController::class, 'createUser']);
// '/api/deleteUser' Supprime une entité User
Route::post('/deleteUser', [UserController::class, 'deleteUser']);



// -------- Stats --------

// '/api/getAllStats' Retourne toutes les entités Stats 
Route::get('/getAllStats', [StatsController::class,  'getAllStats']);
// '/api/getStats' Retourne une entité Stats 
Route::post('/getStats', [StatsController::class,  'getStats']);
// '/api/getStatsById' Retourne une  entité Stats en renseignant son ID
Route::post('/getStatsById', [StatsController::class,  'getStatsById']);
// '/api/createStats' Crée une entité Stats
Route::post('/createStats', [StatsController::class,  'createStats']);
// '/api/deleteStats' Supprime une entité Stats
Route::post('/deleteStats', [StatsController::class,  'deleteStats']);


// -------- FoodLibrary --------

// '/api/getAllFoods' Retourne toutes les entités Food 
Route::get('/getAllFoods', [FoodLibraryController::class, 'getAllFoods']);
// '/api/getFood' Retourne une entité Food 
Route::post('/getFood', [FoodLibraryController::class, 'getFood']);
// '/api/getFoodById' Retourne une  entité Food en renseignant son ID
Route::post('/getFoodById', [FoodLibraryController::class, 'getFoodById']);
// '/api/createFood' Crée une entité Food
Route::post('/createFood', [FoodLibraryController::class, 'createFood']);
// '/api/deleteFood' Supprime une entité Food
Route::post('/deleteFood', [FoodLibraryController::class, 'deleteFood']);


// -------- DataUser --------

// '/api/getAllDataUsersByUser' Retourne toutes les entités DataUsers d'un User
Route::post('/getAllDataUsersByUser', [DataUserController::class, 'getAllDataUsersByUser']);
// '/api/getAllDataUsers' Retourne toutes les entités DataUsers
Route::get('/getAllDataUsers', [DataUserController::class, 'getAllDataUsers']);
// '/api/getDataUser' Retourne une entité DataUser
Route::post('/getDataUser', [DataUserController::class, 'getDataUser']);
// '/api/getDataUserById' Retourne une entité DataUser en renseignant son ID
Route::post('/getDataUserById', [DataUserController::class, 'getDataUserById']);
// '/api/getDataUserById' Retourne les entités DataUser en renseignant son ID et le jour
Route::post('/getDataUserByIdADay', [DataUserController::class, 'getDataUserByIdADay']);
// '/api/createDataUser' Crée une entité DataUser
Route::post('/createDataUser', [DataUserController::class, 'createDataUser']);
// '/api/deleteDataUser' Supprime une entité DataUser
Route::post('/deleteDataUser', [DataUserController::class, 'deleteDataUser']);




// -------- DataUserHasFood --------

// '/api/getAllDataUserHasFood' Retourne toutes les entités DataUserHasFood 
Route::get('/getAllDataUserHasFood', [DataUserHasFoodController::class, 'getAllDataUserHasFood']);
// '/api/getDataUserHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::post('/getDataUserHasFoodById', [DataUserHasFoodController::class, 'getDataUserHasFoodById']);
// '/api/deleteDataUserHasFood' Supprime une entité MealLibraryHasFood
Route::post('/deleteDataUserHasFood', [DataUserHasFoodController::class, 'deleteDataUserHasFood']);





// -------- DataIceCube --------

// '/api/getAllDataIcecubes' Retourne toutes les entités DataIceCube
Route::get('/getAllDataIcecubes', [DataIcecubeController::class, 'getAllDataIcecubes']);
// '/api/getDataIcecube' Retourne une entité DataIceCube
Route::post('/getDataIcecube', [DataIcecubeController::class, 'getDataIcecube']);
// '/api/getDataIcecubeById' Retourne une entité DataIceCube en renseignant son ID
Route::post('/getDataIcecubeById', [DataIcecubeController::class, 'getDataIcecubeById']);
// '/api/createDataIcecube' Crée une entité DataIceCube
Route::post('/createDataIcecube', [DataIcecubeController::class, 'createDataIcecube']);
// '/api/deleteDataIcecube' Supprime une entité DataIceCube
Route::post('/deleteDataIcecube', [DataIcecubeController::class, 'deleteDataIcecube']);



// -------- MealLibrary --------

// '/api/getAllMeals' Retourne toutes les entités Meal 
Route::get('/getAllMeals', [MealLibraryController::class, 'getAllMeals']);
// '/api/getMeal' Retourne une entité Meal 
Route::post('/getMeal', [MealLibraryController::class, 'getMeal']);
// '/api/getMealById' Retourne une  entité Meal en renseignant son ID
Route::post('/getMealById', [MealLibraryController::class, 'getMealById']);
// '/api/createMeal' Crée une entité Meal
Route::post('/createMeal', [MealLibraryController::class, 'createMeal']);
// '/api/deleteMeal' Supprime une entité Meal
Route::post('/deleteMeal', [MealLibraryController::class, 'deleteMeal']);





// -------- MealLibraryHasFood --------

// '/api/getAllMealLibraryHasFood' Retourne toutes les entités MealLibraryHasFood 
Route::get('/getAllMealLibraryHasFood', [MealLibraryHasFoodController::class, 'getAllMealLibraryHasFood']);
// '/api/getMealLibraryHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::post('/getMealLibraryHasFoodById', [MealLibraryHasFoodController::class, 'getAllMealLibraryHasFoodById']);
// '/api/deleteMealLibraryHasFood' Supprime une entité MealLibraryHasFood
Route::post('/deleteMealLibraryHasFood', [MealLibraryHasFoodController::class, 'deleteMealLibraryHasFood']);





// -------- Recipe --------

// '/api/getAllRecipes' Retourne toutes les entités Recipe 
Route::get('/getAllRecipes', [RecipeController::class, 'getAllRecipes']);
// '/api/getRecipe' Retourne une entité Recipe 
Route::post('/getRecipe', [RecipeController::class, 'getRecipe']);
// '/api/getRecipeById' Retourne une  entité Recipe en renseignant son ID
Route::post('/getRecipeById', [RecipeController::class, 'getRecipeById']);
// '/api/createRecipe' Crée une entité Recipe
Route::post('/createRecipe', [RecipeController::class, 'createRecipe']);
// '/api/deleteRecipe' Supprime une entité Recipe
Route::post('/deleteRecipe', [RecipeController::class, 'deleteRecipe']);



// -------- RecipeHasFood --------

// '/api/getAllRecipeHasFood' Retourne toutes les entités RecipeHasFood 
Route::get('/getAllRecipeHasFood', [RecipeHasFoodController::class, 'getAllRecipeHasFood']);
// '/api/getRecipeHasFoodById' Retourne une  entité RecipeHasFood en renseignant son ID
Route::post('/getRecipeHasFoodById', [RecipeHasFoodController::class, 'getRecipeHasFoodById']);
// '/api/deleteRecipeHasFood' Supprime une entité RecipeHasFood
Route::post('/deleteRecipeHasFood', [RecipeHasFoodController::class, 'deleteRecipeHasFood']);






// -------- Advice --------

// '/api/getAllAdvices' Retourne toutes les entités Advice 
Route::get('/getAllAdvices', [AdviceController::class, 'getAllAdvices']);
// '/api/getAdvice' Retourne une entité Advice 
Route::post('/getAdvice', [AdviceController::class, 'getAdvice']);
// '/api/getAdviceById' Retourne une  entité Advice en renseignant son ID
Route::post('/getAdviceById', [AdviceController::class, 'getAdviceById']);
// '/api/createAdvice' Crée une entité Advice
Route::post('/createAdvice', [AdviceController::class, 'createAdvice']);
// '/api/deleteAdvice' Supprime une entité Advice
Route::post('/deleteAdvice', [AdviceController::class, 'deleteAdvice']);




// -------- RecipeSteps --------

// '/api/getAllRecipeSteps' Retourne toutes les entités RecipeSteps 
Route::get('/getAllRecipeSteps', [RecipeStepsController::class, 'getAllRecipeSteps']);
// '/api/getRecipeSteps' Retourne une entité RecipeSteps 
Route::post('/getRecipeSteps',  [RecipeStepsController::class, 'getRecipeSteps']);
// '/api/getRecipeStepsById' Retourne une  entité RecipeSteps en renseignant son ID
Route::post('/getRecipeStepsById',  [RecipeStepsController::class, 'getRecipeStepsById']);
// '/api/createRecipeSteps' Crée une entité RecipeSteps
Route::post('/createRecipeSteps',  [RecipeStepsController::class, 'createRecipeSteps']);
// '/api/deleteRecipeSteps' Supprime une entité RecipeSteps
Route::post('/deleteRecipeSteps',  [RecipeStepsController::class, 'deleteRecipeSteps']);



Route::group(['prefix' => 'stats'], function () {
    Route::get('getMenu', [MenuController::class, 'getMenu']);
    Route::post('setMenu', [MenuController::class, 'setMenu']);
});

Route::group(['prefix' => 'mess'], function () {
    Route::get('getMessage', [MessageController::class, 'getMessage']);
    Route::post('setMessage', [MessageController::class, 'setMessage']);
});

Route::group(['prefix' => 'conv'], function () {
    Route::get('getConversation', [ConversationController::class, 'getConversation']);
    Route::post('setConversation', [ConversationController::class, 'setConversation']);
});

Route::group(['prefix' => 'donneesuiv'], function () {
    Route::get('getDonneeSuivi', [DonneeSuiviController::class, 'getDonneeSuivi']);
    Route::post('setDonneeSuivi', [DonneeSuiviController::class, 'setDonneeSuivi']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('getUser', [UserController::class, 'getUser']);
    Route::post('setUser', [UserController::class, 'setUser']);
});
