<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RecipeHasFood;


use Illuminate\Http\Request;


class RecipeHasFoodController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RecipeHasFood Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    /**
     * Renvoie un RecipeHasFood
     */


    public function getRecipeHasFoodById(Request $request)
    {
        $input = $request->all();
        $recipeHF = RecipeHasFood::where('id_recipe_hf', $input["idrecipehf"])->first();
        return response()->json($recipeHF);
    }

    /**
     * Renvoie tout les RecipeHasFood
     */
    public function getAllRecipeHasFood()
    {
        $recipeHF = RecipeHasFood::all();
        return response()->json($recipeHF);
    }





    public function deleteRecipeHasFood(Request $request)
    {
        $input = $request->all();
        $recipeHF = RecipeHasFood::where('id_recipe_hf', $input["idrecipehf"])->first();
        $recipeHF->delete();
    }
}