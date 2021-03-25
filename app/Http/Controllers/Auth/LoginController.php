<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Core\JWK;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;

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

        if (Auth::attempt(['mail' => $validatedData['mail'], 'password' => $validatedData['password']])) {
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

    // API

    public function api_login(Request $request)
    {
        if (Auth::attempt(['mail' => $request->input('mail'), 'password' => $request->input('password')])) {
            $user = User::where('mail', $request->input('mail'))->first();

            if ($user->email_verified == 1) {
                $user->api_token = Str::random(64);
                $user->save();

                return new UserResource($user);
            } else {
                return response()->json([
                    'erreur' => 'merci de bien vouloir confirmer votre adresse email avant de vous connecter !'
                ]);
            }
        }

        return response()->json([
            'error' => "Informations invalides",
        ]);
    }

    public function api_logout(Request $request)
    {
        $user = User::where('api_token', $request->input('api_token'))->first();

        if (isset($user) && $user->api_token != null) {
            $user->api_token = null;
            $user->save();

            return response()->json([
                "success" => "disconnected",
            ]);
        }

        return response()->json([
            'error' => 'invalid token',
        ]);
    }

    public function api_login_jwt(Request $request)
    {
        // Récupération de l'email et du mot de passe reçus dans le corps de la requête
        $credentials = array("mail" => $request->json('mail'), 'password' => $request->json('password'));

        if (Auth::attempt($credentials) || 1) {
            // Authentification réussie (l'utilisateur existe dans la BDD)
            $user = User::where('mail', $request->input('mail'))->first();

            // Récupération de la clé privée dans le fichier .env à la racine de /jwt-auth
            $private_key = env('JWT_PRIVATE_KEY');

            // On utilise la méthode de chiffrement HS256
            $algorithmManager = new AlgorithmManager([
                new HS256(),
            ]);

            // Création de la clé
            $jwk = new JWK([
                'kty' => 'oct',
                'k' => $private_key,
            ]);

            // L'objet JWSBuilder qui va construire le token
            $jwsBuilder = new JWSBuilder($algorithmManager);

            // Création du payload
            $payload = json_encode([
                'iat' => time(),
                'nbf' => time(),
                'exp' => time() + 3600,
                'iss' => 'My service',
                'aud' => 'MYDIET',
                'sub' => $user->id_user,
            ]);

            $jws = $jwsBuilder
                ->create()                               // Création du token
                ->withPayload($payload)                  // Ajout du payload
                ->addSignature($jwk, ['alg' => 'HS256']) // Ajout de la signature
                ->build();

            $serializer = new CompactSerializer();
            $token = $serializer->serialize($jws, 0);

            return $token;
        }
        else {
            // Authentification échouée (l'utilisateur n'existe pas dans la BDD)
            return "Login invalide";
        }
    }
}
