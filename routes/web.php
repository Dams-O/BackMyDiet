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
use App\Http\Controllers\MailController;
use App\Http\Controllers\Stats\StatsController;
use App\Models\User;
use App\Http\Controllers\AlgoController;

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
Route::get('/', function () {
    if (!Auth::check()) return redirect('/login');
    return view('front.dashboard', ['users' => User::all()]);
})->name('home');

Route::get('viewProfilStats/{id}', [StatsController::class, 'viewProfilStats']);

// Route::get('profil', [UserController::class, 'showProfilPage']);
Route::get(
    '/profil/{id}',
    function ($id) {
        if (!Auth::check()) return redirect()->route('login.login');
        else {
            $algoRequest = new Request(['id_user' => $id]);
            $stats = AlgoController::getStatsByMonthByUserByUser($algoRequest);
            $stats = $stats->getData();
            $user = User::where('id_user', $id)->first();

            $stats_labels = [];
            $stats_datas = [];

            $colors = [];

            $goals_labels = [];
            $goals_datas = [];


            foreach ($stats->month_stats->all as $label => $value) {
                array_push($stats_labels, $label);
                array_push($stats_datas, $value);
            }

            foreach ($stats->goal->all as $label => $value) {
                array_push($goals_labels, $label);
                array_push($goals_datas, $value);
            }

            $stats_chart = (new LarapexChart)->donutChart()
                ->setTitle('Statistiques du mois')
                ->setDataset($stats_datas)
                ->setColors(['#355b9f', '#e13131', '#fab749', '#629b33', '#ef7a3d', '#91398d'])
                ->setLabels($stats_labels);
            $goals_chart = (new LarapexChart)->donutChart()
                ->setTitle('Objectifs du mois')
                ->setDataset($goals_datas)
                ->setColors(['#355b9f', '#e13131', '#fab749', '#629b33', '#ef7a3d', '#91398d'])
                ->setLabels($goals_labels);

            // return view('chart', compact('chart'), compact('chart2'));
            return view('profil', compact('goals_chart', 'stats_chart'), ['user_score' => $stats->user_score, 'goal_score' => $stats->goal_score, 'user' => $user]);
        }
    }
);
