<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
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
        $contrat = Stats::where('id', $iduser)->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'une Statistique
    */
    public function setStats(Request $request)
    {
        $request->saveOrFail();
    }
}
