<?php

namespace App\Http\Middleware;

use Closure;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Core\JWK;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\Signature\JWSVerifier;
use Jose\Component\Signature\Serializer\JWSSerializerManager;
use Jose\Component\Signature\Serializer\CompactSerializer;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Récupération du token reçu dans le header de la requête
        $header_authorization = $request->header('authorization');

        $token = str_replace('Bearer ', '', $header_authorization);
//        $token = str_replace('Bearer ', '', $header_authorization."toto");

        // Récupération de la clé privée dans le fichier .env à la racine de /jwt-auth
        $private_key = env('JWT_PRIVATE_KEY');

        // On utilise la méthode de chiffrement HS256
        $algorithmManager = new AlgorithmManager([
            new HS256(),
        ]);

        // Instance de la classe JWSVerifier pour vérifier le payload et la signature
        $jwsVerifier = new JWSVerifier(
            $algorithmManager
        );

        // Création de la clé
        $jwk = new JWK([
            'kty' => 'oct',
            'k' => $private_key
        ]);

        $serializerManager = new JWSSerializerManager([
            new CompactSerializer(),
        ]);

        $jws = $serializerManager->unserialize($token);
        $isVerified = $jwsVerifier->verifyWithKey($jws, $jwk, 0); // On vérifie le token

        if ($isVerified) {
            // Authentification réussie (le token est valide)
            return $next($request); // On continue la requête
        }
        else {
            // Authentification échouée (le token est invalide)
            return response()->json(array('erreur' => 'Le jeton est invalide'), 403);
        }
    }
}
