<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\Stats;
use App\Models\DonneeSuivi;

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
        $contrat = Stats::first();
        return response()->json($contrat);
    }

    public function getAllStats()
    {
        $stats = Stats::all();
        return response()->json($stats);
    }

    /**
     * Envoie d'une Statistique
    */
    public function setStats(Request $request)
    {
        $request->saveOrFail();
    }
    /**
     * Affiche stats
    */
    public function viewProfilStats($id)
    {
        $users = User::where('id_user', $id)->first();
        $stats = Stats::where('id_util', $id)->get();
        $ds = DonneeSuivi::where('id_util', $id)->get();

        
        return view('front.profilStats', array('users' => $users, 'stats' => $stats, 'ds' => $ds));
    }
}
