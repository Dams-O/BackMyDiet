<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataIcecubeResource;
use App\Models\DataIcecube;
use App\Models\User;
use Illuminate\Http\Request;

class DataIcecubeController extends Controller
{
    /**
     * Renvoie tous les DataIcecubes
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllDataIcecubes()
    {
        return DataIcecubeResource::collection(DataIcecube::all());
    }

    /**
     * @param Request $request
     * @return DataIcecubeResource
     */
    public function getDataIcecubeById(Request $request)
    {
        return DataIcecubeResource::collection(DataIcecube::where('id_data_icecube', $request->input("iddataicecube"))->get());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDataIcecube(Request $request)
    {
        $dataIcecube = new DataIcecube();
        //On left field name in DB and on right field name in Form/
        //$dataIcecube->id_data_icecube = $request->input('iddataicecube');
        $dataIcecube->id_user = $request->input('iduser');
        //$dataIcecube->date = $request->input('date');
        $dataIcecube->calcium = $request->input('calcium');
        $dataIcecube->prot = $request->input('proteines');
        $dataIcecube->GL = $request->input('glucides');
        $dataIcecube->FVSM = $request->input('legumes');
        $dataIcecube->MG = $request->input('lipides');
        $dataIcecube->sucre = $request->input('sucres');
        $dataIcecube->score = $request->input('score');
        $dataIcecube->save();

        return response()->json([
            'code' => '200',
            'message' => "Data Ice cube created"
        ]);
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDataIcecube(Request $request)
    {
        $dataIcecube = DataIcecube::where('id_data_icecube', $request->input("iddataicecube"))->first();
        $dataIcecube->delete();

        return response()->json([
            'code' => '200',
            'message' => "Data Ice cube deleted"
        ]);
    }

    public function getIceByMonthByUser(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user|integer',
            'date' => 'string',
            'interval' => 'integer|required'
        ]);

        if (isset($validatedData['date'])) $target_date = strtotime($validatedData['date']);
        else $target_date = strtotime(date('Y-m', strtotime(now())));

        if ($validatedData['interval'] == 0) return response()->json(["error" => "interval doit etre > 0"]);

        //nombre de mois voulu
        $interval = $validatedData['interval'] - 1;

        //Utilisateur ciblé
        $user = User::where('id_user', $validatedData['id_user'])->first();

        if (!isset($user)) return response()->json(["error" => "user not found"]);
        //if ($interval < 1) return response()->json(["error" => "interval above 0 needed"]);
        // 1 data icecube = 1 mois
        $cptStr = "-" . $interval . " month";

        $first_month = date("Y-m", strtotime($cptStr, $target_date));
        $selected = [];

        $data_ices = $user->dataIces;
        foreach ($data_ices as $one_ice) {

            $once_ice_date = date("Y-m", strtotime($one_ice->created_at));

            if (DataIceCubeController::check_in_range($first_month, date("Y-m", $target_date), $once_ice_date)) {
                array_push($selected, $one_ice);
            }
        }

        $ice_sum = [
            "Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0
        ];




        for ($i = 0; $i < count($selected); $i++) {
            $ice_sum["Calcium"] += $selected[$i]->Calcium;
            $ice_sum["Proteines"] += $selected[$i]->Proteines;
            $ice_sum["Glucides"] += $selected[$i]->Glucides;
            $ice_sum["Legumes"] += $selected[$i]->Legumes;
            $ice_sum["Lipides"] += $selected[$i]->Lipides;
            $ice_sum["Sucre"] += $selected[$i]->Sucre;
            $ice_sum["Score"] += $selected[$i]->score;
        }

        if ($interval < 1) $interval++;

        $ice_sum["Calcium"] /= $interval;
        $ice_sum["Proteines"] /= $interval;
        $ice_sum["Glucides"] /= $interval;
        $ice_sum["Legumes"] /= $interval;
        $ice_sum["Lipides"] /= $interval;
        $ice_sum["Sucre"] /= $interval;
        $ice_sum["Score"] /= $interval;



        $stats = [
            "stats" => $ice_sum,
            "date" => [
                "from" => $first_month,
                "to" => date("Y-m", $target_date)
            ]
        ];

        return response()->json($stats);
    }

    private static function check_in_range($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        $check = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($start <= $check) && ($check <= $end));
    }
}
