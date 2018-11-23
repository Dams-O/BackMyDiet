<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\DonneeSuivi;

class DonneeSuiviController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DonneeSuiviController
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie une DoneeSuivi en lien avec la personne connectée
    */
    public function getDonneeSuivi()
    {
        $contrat = DonneeSuivi::where('id_donnee', $iduser)->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'une DonneeSuivi
    */
    public function setDonneeSuivi(Request $request)
    {
        $request->saveOrFail();
    }
}
