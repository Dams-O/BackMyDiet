<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Mail\AccountVerifyMail;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $validateData = $request->validate([
            'email' => 'required|email|unique:users,mail',
            'pseudo' => 'required|unique:users,pseudo',
            'birthday' => 'string'
        ]);

        $user = new User();
        //On left field name in DB and on right field name in Form/view
        $user->last_name = $request->input('lastname');
        $user->first_name = $request->input('firstname');
        $user->pseudo = $validateData['pseudo'];
        $user->mail = $validateData['email'];
        $user->password = Hash::make($request->input('password'));

        if(isset($validateData['birthday']))
        {
            $user->birthday = $request->input('birthday');
        }
        
        $user->api_token = Str::random(64);
        $user->email_verified = 0;
        $user->save();

        $details = [
            'user_name' => $user->first_name,
            'token' => $user->api_token
        ];

        Mail::to($user->mail)->send(new AccountVerifyMail($details));


        return response()->json([
            "success" => "Compte créé, un email de vérification à été envoyé à $user->email"
        ]);
    }

    public function verifyMail($token)
    {
        $user = User::where('api_token', $token)->first();
        if(isset($user))
        {
            $user->email_verified = 1;
            $user->api_token = null;
            $user->save();

            return response()->json([
                "success" => "Votre compte à bien été vérifié, merci de vous connecter"
            ]);
        }

        return response()->json([
            "error" => "token de vérification inconnu"
        ]);
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
