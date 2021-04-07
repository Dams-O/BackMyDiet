<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\AlgoController;
use App\Http\Controllers\Controller;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;


class StatsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Stats Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie une statistique en lien avec la personne connectée
     */

    /**
     * Affiche stats
     */
    public function viewProfilStats($id)
    {
        $request = new Request(['id_user' => $id]);

        $stats = AlgoController::getStatsByMonthByUser($request);
        $user = User::where('id_user', $id)->first();


        return view('front.profilStats', array('user' => $user, 'stats' => $stats));
    }
}
