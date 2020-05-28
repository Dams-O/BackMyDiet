<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Store;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;




class ConnexionController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function auth(Request $request){
        $input = $request->all();
        $user = User::where('mail',$input["mail"])->first();
        if(empty($user)) {
            $failed = 1;
            return view('front.login')->with('failed', $failed);
        } else {
            if(Hash::check($input['password'], $user->password) == false) {
                $failed = 1;
                return view('front.login')->with('failed', $failed);
            } else {
                $user = User::where('mail',$input["mail"])->where('password', $user->password)->first();
                Auth::login($user);
                return view('profil')->with('user', $user);
            }
        }

        

        

        


       /* if(empty($user)){
            $failed = 1;
            return view('front.login')->with('failed', $failed);
        }
        else {
            Auth::login($user);
            return view('welcome');
        }
        */
    }

    public function logout(){
        Auth::logout();
        return view('front.login');
        
    }

    public function passRecoveryPage(){
        return view('front.passRecovery');
    }



    
      /* public function loginPost(Request $request)
    {
        

        $user = User::where('login', $request->input('login'))->first();
        if (is_null($user)) {
            abort(401, 'Utilisateur inconnu.');
        }

        if ($request->input('password') == $user->password) {
            $request->session()->put('logged', 'true');
            return view('welcome');
        }

       
    }
      */

    
}