<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\User;

class UtilisateurController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Utilisateur Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie un Utilisateur
    */
    public function getUtilisateur()
    {
        $contrat = Utilisateur::where('id_utilisateur')->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'une Conversation
    */
    public function setUtilisateur(Request $request)
    {
        $request->saveOrFail();
    }
}