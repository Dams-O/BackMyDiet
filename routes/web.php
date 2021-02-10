<?php
use App\Http\Controllers\ProfilController;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\FoodLibraryController;
use App\Http\Controllers\MealLibraryController;
use App\Http\Controllers\OpenFoodFactsController;
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
// Route::get('chart', [ProfilController::class, 'showGraph']);
// Route::get('chart', function () {
   
// }); 
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
Route::get('getAllProducts', [OpenFoodFactsController::class, 'getAllProducts']);

// Route::get('profil', [UserController::class, 'showProfilPage']);
Route::get('/', function(Request $request) {
    if(!Auth::check()) return redirect()->route('login.login');
    else {
        $user = User::where('id_user', $request->session()->get('id_user'))->first();
        $chart = (new LarapexChart)->setType('line')
        ->setSubtitle('Kilogrammes')
        ->setXAxis([
            'Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi','Dimanche'
        ])
        ->setColors(['#FF5759'])
        ->setDataset([
            [
                'name'  =>  'Kg',
                'data'  =>  [80, 80, 79.8, 79.7, 79.4, 79.5, 79.4]
            ]
        ]);
        $chart2 = (new LarapexChart)
        ->setDataset([150, 120, 50, 300, 200, 100])
        ->setColors(['#46F068', '#FF0035','#4D8CE3','#BF00E6','#FFF759','#AB0022'])
        ->setLabels(['Published', 'No Published','testadd1', 'testadd2','testadd3', 'testadd4']);
        $chart3 = (new LarapexChart)
        ->setDataset([150, 100, 150, 80, 90, 30])
        ->setColors(['#46F068', '#FF0035','#4D8CE3','#BF00E6','#FFF759','#AB0022'])
        ->setLabels(['Published', 'No Published','testadd1', 'testadd2','testadd3', 'testadd4']);
        $chart4 = (new LarapexChart)
        ->setDataset([100, 20, 200, 250, 100, 180])
        ->setColors(['#46F068', '#FF0035','#4D8CE3','#BF00E6','#FFF759','#AB0022'])
        ->setLabels(['Published', 'No Published','testadd1', 'testadd2','testadd3', 'testadd4']);
        // return view('chart', compact('chart'), compact('chart2'));
        return view('profil', ['user'=>$user],compact('chart','chart2','chart3','chart4'));
    } 
}
);
