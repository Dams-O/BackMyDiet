<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


    public function getUserById(Request $request)
    {
        return new UserResource(User::where('id_user', $request->input('id_user'))->first());
    }

    /**
     * Renvoie tout les Users
     */
    public function getAllUsers()
    {
        return UserResource::collection(User::all());
    }



    public function createUser(Request $request)
    {
        $user = new User();
        //On left field name in DB and on right field name in Form/view
        $user->last_name = $request->input('lastname');
        $user->first_name = $request->input('firstname');
        $user->pseudo = $request->input('pseudo');
        $user->mail = $request->input('mail');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return new UserResource($user);
    }



    public function deleteUser(Request $request)
    {
        $user = User::where('id_user', $request->input('id_user'))->first();
        $user->delete();

        return response()->json([
            "success" => "User deleted"
        ]);
    }


    
    /**
     * Envoie d'un User Web
     */
    /*
    public function setUserWeb(Request $request)
    {
        var_dump($request->nom);
        exit;
        return view('front.validationformulaire', array());
    }*/

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
