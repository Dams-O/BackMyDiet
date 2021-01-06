<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Affiche la page de connexion
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('front.login');
    }

    /**
     * Connecte l'utilisateur
     *
     * @param Illuminate\Http\Request $request;
     * @return \Illuminate\Http\RedirectResponse;
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'mail' => 'string|required|exists:users,mail',
            'password' => 'string|required',
        ]);

        if(Auth::attempt(['mail' => $validatedData['mail'], 'password' => $validatedData['password']]))
        {
            $user = User::where('mail', $validatedData['mail'])->first();
            Auth::login($user);
            //on recréer la session, (si elle n'existait pas par défaut)
            $request->session()->regenerate();
            $request->session()->put('id_user', $user->id_user);

            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Les informations fournies sont fausses'
        ]);
    }


    /**
     * Déconnecte l'utilisateur
     *
     * @param Illuminate\Http\Request $request;
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
