<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
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

    public function getRecipeById(Request $request)
    {
        return RecipeResource::collection(Recipe::where('id_recipe', $request->input('idrecipe'))->get());
    }

    /**
     * Renvoie tout les Recipes
     */
    public function getAllRecipes()
    {
        return RecipeResource::collection(Recipe::all());
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

        return response()->json([
            'code' => '200',
            'message' => "Recipe created"
        ]);
    }



    public function deleteRecipe(Request $request)
    {
        $input = $request->all();
        var_dump($input);
        $recipe = Recipe::where('id_recipe', $input["id_recipe"])->first();
        $recipe->delete();

        return response()->json([
            'code' => '200',
            'message' => "Recipe deleted"
        ]);
    }
}
