<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeHasFood;


use Illuminate\Http\Request;


class RecipeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Recipe Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    /**
     * Renvoie un Recipe
     */
    public function getRecipe(Request $request)
    {
        $input = $request->all();
        $recipe = Recipe::where('title',$input["title"])->first();
        return response()->json($recipe);
    }

    public function getRecipeById(Request $request)
    {
        $input = $request->all();
        $recipe = Recipe::where('id_recipe', $input["idrecipe"])->first();
        return response()->json($recipe);
    }

    /**
     * Renvoie tout les Recipes
     */
    public function getAllRecipes()
    {
        $recipes = Recipe::all();
        return response()->json($recipes);
    }



    public function createRecipe(Request $request)
    {
        $recipe = new Recipe();
        //On left field name in DB and on right field name in Form/view
        $recipe->picture = $request->input('picture');
        $recipe->title = $request->input('title');
        $recipe->hashtag = $request->input('hashtag');
        $recipe->id_meal = $request->input('idmeal');
        $recipe->id_meal_category = $request->input('idmealcategory');
        $recipe->preparation_time = $request->input('preparationtime');
        $recipe->cooking_time = $request->input('cookingtime');
        $recipe->parts_number = $request->input('partsnumber');
        $recipe->save();



        $recipeHF = new RecipeHasFood();
        $recipeHF->id_recipe = $recipe->id_recipe; 
        $recipeHF->id_food = $request->input('idfood');
        $recipeHF->description = $request->input('description');
        $recipeHF->save();
    }



    public function deleteRecipe(Request $request)
    {
        $input = $request->all();
        var_dump($input);
        $recipe = Recipe::where('id_recipe', $input["idrecipe"])->first();
        $recipe->delete();
    }
}