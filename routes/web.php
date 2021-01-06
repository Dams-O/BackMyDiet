<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\FoodLibraryController;
use App\Http\Controllers\MealLibraryController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;

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

// à update en laravel
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('addFood', [MealLibraryController::class, 'addFoodPage']);
Route::post('addFoodForm', [FoodLibraryController::class, 'createFood']);
Route::post('foodCompletion', [MealLibraryController::class, 'search']);
Route::get('addRecette', [RecetteController::class, 'showPage']);
Route::get('forget', [ConnexionController::class, 'passRecoveryPage']);
Route::get('menuType', [RecetteController::class, 'showMenuPage']);
Route::get('search', [UserController::class, 'showSearchPage']);
// Route::get('profil', [UserController::class, 'showProfilPage']);
Route::get('/', function(Request $request) {
    if(!Auth::check()) return redirect()->route('login.login');
    else {
        $user = User::where('id_user', $request->session()->get('id_user'))->first();
        return view('profil', ['user'=>$user]);
    }
}
);
