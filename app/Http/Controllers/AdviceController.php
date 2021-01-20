<?php

namespace App\Http\Controllers;
use App\Http\Resources\AdviceResource;
use App\Models\Advice;

use Illuminate\Http\Request;

class AdviceController extends Controller
{
    /**
     * @param Request $request
     * @return AdviceResource
     */
    public function getAdvice(Request $request)
    {
        return new AdviceResource(Advice::where('id_advice', $request->input("idadvice"))->first());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdvicebyId(Request $request)
    {
        $input = $request->all();
        $advice = Advice::where('id_advice', $input["idadvice"])->first();
        return response()->json($advice);
    }

    /**
     * Renvoie tous les Advices
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllAdvices()
    {
        return AdviceResource::collection(Advice::all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAdvice(Request $request)
    {
        $advice = new Advice();
        //On left field name in DB and on right field name in Form/view
        $advice->description = $request->input('description');
        $advice->save();

        return response()->json([
            'code' => '200',
            'message' => "Advice created"
        ]);
    }


    /**
     * Delete a Advice
     * @param Request $request
     */
    public function deleteAdvice(Request $request)
    {
        $advice = Advice::where('id_advice', $request->input('idadvice'))->first();
        $advice->delete();

        response()->json([
            'code' => '200',
            'message' => "Advice deleted"
        ]);
    }
}
