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
        $advices = Advice::all();
        return response()->json($advices);
    }


    public function createAdvice(Request $request)
    {
        $advice = new Advice();
        //On left field name in DB and on right field name in Form/view
        $advice->description = $request->input('description');

        $advice->save();

    }

    /**
     * Delete a Advice
     * 
     * 
     * 
    */
    public function deleteAdvice(Request $request)
    {
        $input = $request->all();
        $advice = Advice::where('id_advice', $input["idadvice"])->first();
        $advice->delete();
    }
}
