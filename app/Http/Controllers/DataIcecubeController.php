<?php

namespace App\Http\Controllers;
use App\Http\Resources\DataIcecubeResource;
use App\Models\DataIcecube;

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
        return new DataIcecubeResource(DataIcecube::where('id_data_icecube', $request->input("iddataicecube"))->first());
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
        $dataIcecube->prot = $request->input('prot');
        $dataIcecube->GL = $request->input('GL');
        $dataIcecube->FVSM = $request->input('FVSM');
        $dataIcecube->MG = $request->input('MG');
        $dataIcecube->sucre = $request->input('sucre');
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
}
