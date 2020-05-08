<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataUserHasFood;

use Illuminate\Http\Request;

class DataUserHasFoodController extends Controller
{

    public function getDataUserHasFoodById(Request $request)
    {
        $input = $request->all();
        $dataUserhf = DataUserHasFood::where('id_data_user_hf', $input["iddatauserhf"])->first();
        return response()->json($dataUserhf);
    }

    /**
     * Renvoie tous les DataUserHasFood
     */
    public function getAllDataUserHasFood()
    {
        $dataUserhf = DataUserHasFood::all();
        return response()->json($dataUserhf);
    }



    public function deleteDataUserHasFood(Request $request)
    {
        $input = $request->all();
        $dataUserhf = DataUserHasFood::where('id_data_user_hf', $input["iddatauserhf"])->first();
        $dataUserhf->delete();
    }
}
