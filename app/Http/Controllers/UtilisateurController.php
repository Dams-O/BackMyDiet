<?php

namespace App\Http\Controllers;

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

    /**
     * Affiche dashboard
    */
    public function viewDashboard()
    {
        $usersAll = User::all();
        $users = [];
        foreach($usersAll as $user)
        {
            $users[] = $user->nom;
        }
        return view('front.dashboard', array('users' => $usersAll, 'username' => $users));
    }

    public function viewDashboardFiltre($nom)
        {
            $user = User::where('nom', $nom)->first();

            return view('front.dashboard', array('users' => $user));
        }
    


}
