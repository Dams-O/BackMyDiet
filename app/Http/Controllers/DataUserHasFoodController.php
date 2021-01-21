<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataUserHasFood;

use Illuminate\Http\Request;

class DataUserHasFoodController extends Controller
{

    /**
     * creer un DataUserHasFood
     */
    public function createDataUserHasFood(Request $request)
    {
        $datauserhf = new DataUserHasFood();
        $datauserhf->id_data_user = $request->input('id_data_user');
        $datauserhf->id_food = $request->input('id_food');
        $datauserhf->save();

        return response()->json([
            'code' => '200',
            'message' => "Data user has food link created"
        ]);
    }



    public function deleteDataUserHasFood(Request $request)
    {
        $input = $request->all();
        $dataUserhf = DataUserHasFood::where('id_data_user_hf', $input["iddatauserhf"])->first();
        $dataUserhf->delete();

        return response()->json([
            'code' => '200',
            'message' => "Data user has food link deleted"
        ]);
    }
}
