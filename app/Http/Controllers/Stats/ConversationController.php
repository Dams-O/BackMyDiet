<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\Conversation;

class ConversationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Conversation Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie une conversation
    */
    public function getConversation()
    {
        $contrat = Conversation::where('id_conv')->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'une Conversation
    */
    public function setConversation(Request $request)
    {
        $request->saveOrFail();
    }
}
