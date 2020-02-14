<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
     * Renvoie un RecipeSteps
     */
    public function getRecipeSteps(Request $request)
    {
        $input = $request->all();
        $recipeSteps = RecipeSteps::where('id_recipe_steps',$input["idrecipesteps"])->first();
        return response()->json($recipeSteps);
    }

    public function getRecipeStepsById(Request $request)
    {
        $input = $request->all();
        $recipeSteps = RecipeSteps::where('id_recipe_steps', $input["idrecipesteps"])->first();
        return response()->json($recipeSteps);
    }

    /**
     * Renvoie tout les RecipeSteps
     */
    public function getAllRecipeSteps()
    {
        $recipeSteps = RecipeSteps::all();
        return response()->json($recipeSteps);
    }



    public function createRecipeSteps(Request $request)
    {
        $recipe = new RecipeSteps();
        //On left field name in DB and on right field name in Form/view
        $recipeSteps->id_recipe_steps = $request->input('idrecipesteps');
        $recipeSteps->id_recipe = $request->input('idrecipe');
        $recipeSteps->step_number = $request->input('stepnumber');
        $recipeSteps->save();
    }



    public function deleteRecipeSteps(Request $request)
    {
        $input = $request->all();
        $recipeSteps = RecipeSteps::where('id_recipe_steps', $input["idrecipesteps"])->first();
        $recipeSteps->delete();
    }
}