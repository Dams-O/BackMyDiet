<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MealLibraryHasFood;


use Illuminate\Http\Request;

class MealLibraryHasFoodController extends Controller
{
    /**
     * Renvoie tous les MealLibraryHasFood
     */
    public function createMealLibraryHasFood(Request $request)
    {
        $mealfood = new MealLibraryHasFood();
        $mealfood->id_food = $request->input('id_food');
        $mealfood->id_meal = $request->input('id_meal');
        $mealfood->save();

        return response()->json([
            'code' => '200',
            'message' => "Meal library has food link created"
        ]);
    }


    

    public function deleteMealLibraryHasFood(Request $request)
    {
        $input = $request->all();
        $meallibraryhf = MealLibraryHasFood::where('id_meal_library_hf',$input["id_meal_library_hf"])->first();
        $meallibraryhf->delete();

        return response()->json([
            'code' => '200',
            'message' => "Meal library has food link deleted"
        ]);
    }
}
