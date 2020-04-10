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


    public function createDataIcecube(Request $request)
    {
        $dataIcecube = new DataIcecube();
        //On left field name in DB and on right field name in Form/
        //$dataIcecube->id_data_icecube = $request->input('iddataicecube');
        $dataIcecube->id_user = $request->input('iduser');
        //$dataIcecube->date = $request->input('date');
        $dataIcecube->calcium = $request->input('calcium');
        $dataIcecube->prot = $request->input('prot');
        $dataIcecube->GL = $request->input('GL');
        $dataIcecube->FVSM = $request->input('FVSM');
        $dataIcecube->MG = $request->input('MG');
        $dataIcecube->sucre = $request->input('sucre');
        $dataIcecube->score = $request->input('score');
        // à corriger
        $dataIcecube->save();
    }

    /**
     * Delete a DataIceCube
     * 
     * 
     * 
    */
    public function deleteDataIcecube(Request $request)
    {
        $input = $request->all();
        $dataIcecube = DataIcecube::where('id_data_icecube', $input["iddataicecube"])->first();
        $dataIcecube->delete();
    }
}
