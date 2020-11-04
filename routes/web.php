<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\FoodLibraryController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MealLibraryController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {

    if (!Auth::check()){
        return view('front.login');
        }
    else{
        return view('profil');
    }
});

// à update en laravel
Route::post('auth', [ConnexionController::class, 'auth']);
Route::get('logout', [ConnexionController::class, 'logout']);
Route::get('form', [InscriptionController::class, 'form']);
Route::post('register', [InscriptionController::class, 'register']);
Route::get('addFood', [MealLibraryController::class, 'addFoodPage']);
Route::post('addFoodForm', [FoodLibraryController::class, 'createFood']);
Route::post('foodCompletion', [MealLibraryController::class, 'search']);
Route::get('addRecette', [RecetteController::class, 'showPage']);
Route::get('forget', [ConnexionController::class, 'passRecoveryPage']);
Route::get('menuType', [RecetteController::class, 'showMenuPage']);
Route::get('search', [UserController::class, 'showSearchPage']);
Route::get('profil', [UserController::class, 'showProfilPage']);