<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Models\Stats;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Stats Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Renvoie une statistique en lien avec la personne connectée
    */
    public function getStats(Request $request)
    {
        $input = $request->all();
        $stats = Stats::where('id_user',$input["iduser"])->get();
        return response()->json($stats);
    }

    public function getAllStats()
    {
        $stats = Stats::all();
        return response()->json($stats);
    }

    public function getStatsById(Request $request)
    {
        $input = $request->all();
        $stats = Stats::where('id_user', $input["iduser"])->first();
        return response()->json($stats);
    }


    public function createStats(Request $request)
    {
        $stats = new Stats();
        //On left field name in DB and on right field name in Form/view
        $stats->id_user = $request->input('iduser');
        $stats->xp = $request->input('xp');
        $stats->tier = $request->input('tier');
        $stats->save();
    }

    public function deleteStats(Request $request)
    {
        $input = $request->all();
        $stats = Stats::where('id_stats', $input["idstats"])->first();
        $stats->delete();
    }

    /**
     * Envoie d'une Statistique
    */
    public function setStats(Request $request)
    {
        $request->saveOrFail();
    }
    /**
     * Affiche stats
    */
    public function viewProfilStats($id)
    {
        $users = User::where('id_user', $id)->first();
        $stats = Stats::where('id_user', $id)->get();
        $ds = DonneeSuivi::where('id_user', $id)->get();

        
        return view('front.profilStats', array('users' => $users, 'stats' => $stats, 'ds' => $ds));
    }
}
