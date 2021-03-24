<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeStepsResource;
use App\Models\RecipeSteps;

use Illuminate\Http\Request;


class RecipeStepsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RecipeSteps Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */


    /**
     * Renvoie une étape de recette par son id
     */
    public function getRecipeStepsById(Request $request)
    {
        return RecipeStepsResource::collection(RecipeSteps::where('id_recipe_steps', $request->input('idrecipesteps'))->get());
    }

    /**
     * Renvoie tout les RecipeSteps
     */
    public function getAllRecipeSteps()
    {
        return RecipeStepsResource::collection(RecipeSteps::all());
    }


    /**
     * Créer une étape de recette
     */
    public function createRecipeSteps(Request $request)
    {
        $recipeSteps = new RecipeSteps();
        //On left field name in DB and on right field name in Form/view
        $recipeSteps->id_recipe = $request->input('id_recipe');
        $recipeSteps->step_number = $request->input('stepnumber');
        $recipeSteps->save();

        return new RecipeStepsResource($recipeSteps);
    }



    /**
     * Supprime une étape de recette
     */
    public function deleteRecipeSteps(Request $request)
    {
        $input = $request->all();
        $recipeSteps = RecipeSteps::where('id_recipe_steps', $input["id_recipe_steps"])->first();
        $recipeSteps->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Recipe step deleted !'
        ]);
    }
}
