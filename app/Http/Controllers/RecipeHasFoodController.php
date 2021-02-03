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

    public function createRecipeHasFood(Request $request)
    {
        $rechasfood = new RecipeHasFood();
        $rechasfood->id_food = $request->input('id_food');
        $rechasfood->id_recipe = $request->input('id_recipe');
        $rechasfood->save();

        return response()->json([
            'code' => '200',
            'message' => "Recipe has food link created"
        ]);
    }

 


    public function deleteRecipeHasFood(Request $request)
    {
        $input = $request->all();
        $recipeHF = RecipeHasFood::where('id_recipe_hf', $input["id_recipe_hf"])->first();
        $recipeHF->delete();

        return response()->json([
            'code' => '200',
            'message' => "Recipe has food link deleted"
        ]);
    }
}