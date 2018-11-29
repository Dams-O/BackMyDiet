<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Stats;

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
    public function getStats()
    {
        $contrat = Stats::where('id_utilisateur', $iduser)->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'une Statistique
    */
    public function setStats(Request $request)
    {
        $request->saveOrFail();
    }
    /**
     * Affiche dashboard
    */
    public function viewDashboard()
    {
        $users = User::all();
        
        return view('front.dashboard', $users);
    }
}
