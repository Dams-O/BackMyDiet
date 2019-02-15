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
     * Envoie d'un utilisateur Web
    */
    public function setUtilisateurWeb(Request $request)
    {
        var_dump($request->nom);
        exit;
        return view('front.validationformulaire', array());  
    }

    /**
     * Envoie d'un utilisateur en passant par le mobile
    */
    public function setUtilisateur(Request $request)
    {
        $request->saveOrFail();
    }

    /**
     * Renvoie le formulaire web utilisateur
    */
    public function formulaireUtilisateur()
    {
        return view('front.formulaire', array());      
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
