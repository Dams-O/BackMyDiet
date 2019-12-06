<?php

namespace App\Http\Controllers;
use App\Models\DataIcecube;

use Illuminate\Http\Request;

class DataIcecubeController extends Controller
{
    public function getDataIcecube(Request $request)
    {
        $input = $request->all();
        $dataIcecube = DataIcecube::where('id_user',$input["iduser"])->first();
        return response()->json($dataIcecube);
    }

    public function getDataIcecubeById(Request $request)
    {
        $input = $request->all();
        $dataIcecube = DataIcecube::where('id_data_icecube', $input["iddataicecube"])->first();
        var_dump($dataIcecube);
        exit;
        return response()->json($dataIcecube);
    }

    /**
     * Renvoie tous les DataIcecubes
     */
    public function getAllDataIcecubes()
    {
        $dataIcecubes = DataIcecube::all();
        return response()->json($dataIcecubes);
    }
}
