<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $user = User::where('id_user', $input["iduser"])->first();
        return response()->json($user);
    }

    /**
     * Renvoie tout les Users
     */
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }



    public function createUser(Request $request)
    {
        $user = new User();
        //On left field name in DB and on right field name in Form/view
        $user->last_name = $request->input('lastname');
        $user->first_name = $request->input('firstname');
        $user->pseudo = $request->input('pseudo');
        $user->mail = $request->input('mail');
        $user->password = $request->input('password');
        //var_dump($user);
        /*$user->remember_token = $request->input('remembertoken');
        $user->created_at = $request->input('createdat');
        $user->updated_at = $request->input('updatedat');*/
        $user->save();
    }



    public function deleteUser(Request $request)
    {
        $input = $request->all();
        var_dump($input);
        $user = User::where('id_user', $input["iduser"])->first();
        $user->delete();
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

    
    public function viewDashboardFiltre($nom)
    {
        $user = User::where('nom', $nom)->first();

        return view('front.dashboard', array('users' => $user));
    }

    public function showSearchPage() {
        return view('search');
    }

    public function showProfilPage() {

        if (!Auth::check()){
            return view('front.login');
            }
        else{
            return view('profil');
        }
    }

   
}
