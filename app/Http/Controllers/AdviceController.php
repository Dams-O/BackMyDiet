<?php

namespace App\Http\Controllers;
use App\Models\Advice;

use Illuminate\Http\Request;

class AdviceController extends Controller
{
    public function getAdvice(Request $request)
    {
        $input = $request->all();
        $advice = Advice::where('id_advice',$input["idadvice"])->first();
        return response()->json($advice);
    }

    public function getAdvicebyId(Request $request)
    {
        $input = $request->all();
        $advice = Advice::where('id_advice', $input["idadvice"])->first();
        return response()->json($advice);
    }

    /**
     * Renvoie tous les Advices
     */
    public function getAllAdvices()
    {
        $advices = DataIcecube::all();
        return response()->json($advices);
    }


    public function createAdvice(Request $request)
    {
        $advice = new Advice();
        //On left field name in DB and on right field name in Form/view
        $dataIcecube->id_user = $request->input('iduser');
        $dataIcecube->date = $request->input('date');
        $dataIcecube->calcium = $request->input('calcium');
        $dataIcecube->prot = $request->input('prot');
        $dataIcecube->GL = $request->input('GL');
        $dataIcecube->FVSM = $request->input('FVSM');
        $dataIcecube->MG = $request->input('MG');
        $dataIcecube->sucre = $request->input('sucre');
        $dataIcecube->score = $request->input('score');
        exit;
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
