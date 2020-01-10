<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Store;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;





class ConnexionController extends Controller
{
    use AuthenticatesUsers;
     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(){
        return view('front.login');
    }

    public function auth(Request $request){
        $input = $request->all();
        $user = User::where('user', $input['mail'], 'pass', $input['password'])->first();
        var_dump($user);
        exit;
        Auth::login($user);
        
        return view('welcome');
    }


    public function logout(){
        Auth::logout();
        return view('welcome');
        
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