<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Stats;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    /**
     * Renvoie un User
     */
    public function getUser(Request $request)
    {
        $input = $request->all();
        $user = User::where('mail',$input["mail"])->where('password',$input["password"])->first();
        return response()->json($user);
    }

    public function getUserById(Request $request)
    {
        $input = $request->all();
        $contrat = User::where('id_user', $input["iduser"])->first();
        return response()->json($contrat);
    }

    /**
     * Renvoie tout les Users
     */
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    
    /**
     * Envoie d'un User Web
     */
    public function setUserWeb(Request $request)
    {
        var_dump($request->nom);
        exit;
        return view('front.validationformulaire', array());
    }

    /**
     * Envoie d'un User en passant par le mobile
     */
    public function setUser(Request $request)
    {
        $request->saveOrFail();
    }

    /**
     * Renvoie le formulaire web User
     */
    public function formulaireUser()
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
        foreach ($usersAll as $user) {
            $users[] = $user->first_name;
        }
        return view('front.dashboard', array('users' => $usersAll, 'username' => $users));
    }

    public function getStats()
    {
        exit;
        //$contrat = Stats::where('id_user', $iduser)->first();
        $contrat = Stats::all();
        
        return response()->json($contrat);
    }

    public function viewDashboardFiltre($nom)
    {
        $user = User::where('nom', $nom)->first();

        return view('front.dashboard', array('users' => $user));
    }

   
}
