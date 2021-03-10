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
use App\Http\Controllers\AlgoController;
use App\Http\Controllers\Auth\LoginController;
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

//Vérification du mail
Route::get('/account/verify/{token}', [UserController::class, 'verifyMail']);

Route::post('/login', [LoginController::class, 'api_login']);
Route::post('/logout', [LoginController::class, 'api_logout']);

Route::post('/login-jwt', [LoginController::class, 'api_login_jwt']);
Route::middleware('jwt')->get('/getAllUsers', [UserController::class, 'getAllUsers']);


Route::post('/createUser', [UserController::class, 'createUser']);


//Algorithmes de stats
Route::middleware('auth:api')->post('/getDataMealScore', [AlgoController::class, "getStatsByMonthByUser"]);

Route::middleware('auth:api')->post('/getStatsByDay', [AlgoController::class, "getStatsByDayByUser"]);

// -------- User --------

// '/api/getAllUsers' Retourne toutes les entités User
//Route::middleware('auth:api')->get('/getAllUsers', [UserController::class, 'getAllUsers']);
// '/api/getUserById' Retourne une  entité User en renseignant son ID
Route::middleware('auth:api')->post('/getUserById', [UserController::class, 'getUserById']);
// '/api/createUser' Crée une entité User

// '/api/deleteUser' Supprime une entité User
Route::middleware('auth:api')->post('/deleteUser', [UserController::class, 'deleteUser']);



// -------- Stats --------

// '/api/getAllStats' Retourne toutes les entités Stats
Route::middleware('auth:api')->get('/getAllStats', [StatsController::class,  'getAllStats']);
// '/api/getStatsById' Retourne une  entité Stats en renseignant son ID
Route::middleware('auth:api')->post('/getStatsById', [StatsController::class,  'getStatsById']);
// '/api/createStats' Crée une entité Stats
Route::middleware('auth:api')->post('/createStats', [StatsController::class,  'createStats']);
// '/api/deleteStats' Supprime une entité Stats
Route::middleware('auth:api')->post('/deleteStats', [StatsController::class,  'deleteStats']);


// -------- FoodLibrary --------

// '/api/getAllFoods' Retourne toutes les entités Food
Route::middleware('auth:api')->get('/getAllFoods', [FoodLibraryController::class, 'getAllFoods']);
// '/api/getFoodById' Retourne une  entité Food en renseignant son ID
Route::middleware('auth:api')->post('/getFoodById', [FoodLibraryController::class, 'getFoodById']);
// '/api/createFood' Crée une entité Food
Route::middleware('auth:api')->post('/createFood', [FoodLibraryController::class, 'createFood']);
// '/api/deleteFood' Supprime une entité Food
Route::middleware('auth:api')->post('/deleteFood', [FoodLibraryController::class, 'deleteFood']);


// -------- DataUser --------

// '/api/getAllDataUsersByUser' Retourne toutes les entités DataUsers d'un User
Route::middleware('auth:api')->post('/getAllDataUsersByUser', [DataUserController::class, 'getAllDataUsersByUser']);
// '/api/getAllDataUsers' Retourne toutes les entités DataUsers
Route::middleware('auth:api')->get('/getAllDataUsers', [DataUserController::class, 'getAllDataUsers']);
// '/api/getDataUserById' Retourne une entité DataUser en renseignant son ID
Route::middleware('auth:api')->post('/getDataUserById', [DataUserController::class, 'getDataUserById']);
// '/api/getDataUserById' Retourne les entités DataUser en renseignant son ID et le jour
Route::middleware('auth:api')->post('/getDataUserByIdADay', [DataUserController::class, 'getDataUserByIdADay']);
// '/api/createDataUser' Crée une entité DataUser
Route::middleware('auth:api')->post('/createDataUser', [DataUserController::class, 'createDataUser']);
// '/api/deleteDataUser' Supprime une entité DataUser
Route::middleware('auth:api')->post('/deleteDataUser', [DataUserController::class, 'deleteDataUser']);




// -------- DataUserHasFood --------

// '/api/getDataUserHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::middleware('auth:api')->post('/createDataUserHasFood', [DataUserHasFoodController::class, 'createDataUserHasFood']);
// '/api/deleteDataUserHasFood' Supprime une entité MealLibraryHasFood
Route::middleware('auth:api')->post('/deleteDataUserHasFood', [DataUserHasFoodController::class, 'deleteDataUserHasFood']);





// -------- DataIceCube --------

// '/api/getAllDataIcecubes' Retourne toutes les entités DataIceCube
Route::middleware('auth:api')->get('/getAllDataIcecubes', [DataIcecubeController::class, 'getAllDataIcecubes']);
// '/api/getDataIcecubeById' Retourne une entité DataIceCube en renseignant son ID
Route::middleware('auth:api')->post('/getDataIcecubeById', [DataIcecubeController::class, 'getDataIcecubeById']);
// '/api/createDataIcecube' Crée une entité DataIceCube
Route::middleware('auth:api')->post('/createDataIcecube', [DataIcecubeController::class, 'createDataIcecube']);
// '/api/deleteDataIcecube' Supprime une entité DataIceCube
Route::middleware('auth:api')->post('/deleteDataIcecube', [DataIcecubeController::class, 'deleteDataIcecube']);



// -------- MealLibrary --------

// '/api/getAllMeals' Retourne toutes les entités Meal
Route::middleware('auth:api')->get('/getAllMeals', [MealLibraryController::class, 'getAllMeals']);
// '/api/getMealById' Retourne une  entité Meal en renseignant son ID
Route::middleware('auth:api')->post('/getMealById', [MealLibraryController::class, 'getMealById']);
// '/api/createMeal' Crée une entité Meal
Route::middleware('auth:api')->post('/createMeal', [MealLibraryController::class, 'createMeal']);
// '/api/deleteMeal' Supprime une entité Meal
Route::middleware('auth:api')->post('/deleteMeal', [MealLibraryController::class, 'deleteMeal']);





// -------- MealLibraryHasFood --------

// '/api/getMealLibraryHasFoodById' Retourne une  entité MealLibraryHasFood en renseignant son ID
Route::middleware('auth:api')->post('/createMealLibraryHasFood', [MealLibraryHasFoodController::class, 'createMealLibraryHasFood']);
// '/api/deleteMealLibraryHasFood' Supprime une entité MealLibraryHasFood
Route::middleware('auth:api')->post('/deleteMealLibraryHasFood', [MealLibraryHasFoodController::class, 'deleteMealLibraryHasFood']);





// -------- Recipe --------

// '/api/getAllRecipes' Retourne toutes les entités Recipe
Route::middleware('auth:api')->get('/getAllRecipes', [RecipeController::class, 'getAllRecipes']);
// '/api/getRecipeById' Retourne une  entité Recipe en renseignant son ID
Route::middleware('auth:api')->post('/getRecipeById', [RecipeController::class, 'getRecipeById']);
// '/api/createRecipe' Crée une entité Recipe
Route::middleware('auth:api')->post('/createRecipe', [RecipeController::class, 'createRecipe']);
// '/api/deleteRecipe' Supprime une entité Recipe
Route::middleware('auth:api')->post('/deleteRecipe', [RecipeController::class, 'deleteRecipe']);



// -------- RecipeHasFood --------

// '/api/getRecipeHasFoodById' Retourne une  entité RecipeHasFood en renseignant son ID
Route::middleware('auth:api')->post('/createRecipeHasFood', [RecipeHasFoodController::class, 'createRecipeHasFood']);
// '/api/deleteRecipeHasFood' Supprime une entité RecipeHasFood
Route::middleware('auth:api')->post('/deleteRecipeHasFood', [RecipeHasFoodController::class, 'deleteRecipeHasFood']);




// -------- Advice --------

// '/api/getAllAdvices' Retourne toutes les entités Advice
Route::middleware('auth:api')->get('/getAllAdvices', [AdviceController::class, 'getAllAdvices']);
// '/api/getAdviceById' Retourne une  entité Advice en renseignant son ID
Route::middleware('auth:api')->post('/getAdviceById', [AdviceController::class, 'getAdviceById']);
// '/api/createAdvice' Crée une entité Advice
Route::middleware('auth:api')->post('/createAdvice', [AdviceController::class, 'createAdvice']);
// '/api/deleteAdvice' Supprime une entité Advice
Route::middleware('auth:api')->post('/deleteAdvice', [AdviceController::class, 'deleteAdvice']);




// -------- RecipeSteps --------

// '/api/getAllRecipeSteps' Retourne toutes les entités RecipeSteps
Route::middleware('auth:api')->get('/getAllRecipeSteps', [RecipeStepsController::class, 'getAllRecipeSteps']);
// '/api/getRecipeStepsById' Retourne une  entité RecipeSteps en renseignant son ID
Route::middleware('auth:api')->post('/getRecipeStepsById',  [RecipeStepsController::class, 'getRecipeStepsById']);
// '/api/createRecipeSteps' Crée une entité RecipeSteps
Route::middleware('auth:api')->post('/createRecipeSteps',  [RecipeStepsController::class, 'createRecipeSteps']);
// '/api/deleteRecipeSteps' Supprime une entité RecipeSteps
Route::middleware('auth:api')->post('/deleteRecipeSteps',  [RecipeStepsController::class, 'deleteRecipeSteps']);



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
