<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Message Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie un Message avec l'id de l'utilisateur
    */
    public function getMessage()
    {
        $contrat = Message::where('id_utilisateur', $iduser)->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'un Message
    */
    public function setMessage(Request $request)
    {
        $request->saveOrFail();
    }
}
