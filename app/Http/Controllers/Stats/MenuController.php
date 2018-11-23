<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menu Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie un Menutype en lien avec la personne connectée
    */
    public function getMenu()
    {
        $contrat = Menu::where('id_utilisateur', $iduser)->first();
        return response()->json($contrat);
    }
    /**
     * Renvoie un Menutype en se servant de son id
     */
    public function get($id)
    {
        $contrat = Menu::where('id_menu', $id)->first();
        return response()->json($contrat);
    }
    /**
     * Envoie d'un Menutype
    */
    public function setMenu(Request $request)
    {
        $request->saveOrFail();
    }
}
