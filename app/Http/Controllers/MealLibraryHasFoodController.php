<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MealLibraryHasFood;


use Illuminate\Http\Request;

class MealLibraryHasFoodController extends Controller
{

    public function getMealLibraryHasFoodById(Request $request)
    {
        $input = $request->all();
        $meallibraryhf = MealLibraryHasFood::where('id_meal_library_hf',$input["idmeallibraryhf"])->first();
        return response()->json($meallibraryhf);
    }


    /**
     * Renvoie tous les MealLibraryHasFood
     */
    public function getAllMealLibraryHasFood()
    {
        $meallibraryhf = MealLibraryHasFood::all();
        return response()->json($meallibraryhf);
    }



    public function deleteMealLibraryHasFood(Request $request)
    {
        $input = $request->all();
        $meallibraryhf = MealLibraryHasFood::where('id_meal_library_hf',$input["idmeallibraryhf"])->first();
        $meallibraryhf->delete();
    }
}
