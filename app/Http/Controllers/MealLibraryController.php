<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MealLibrary;
use App\Models\MealLibraryHasFood;



use Illuminate\Http\Request;

class MealLibraryController extends Controller
{
    public function getMeal(Request $request)
    {
        $input = $request->all();
        $meal = MealLibrary::where('name',$input["name"])->first();
        return response()->json($meal);
    }

    public function getMealById(Request $request)
    {
        $input = $request->all();
        $meal = MealLibrary::where('id_meal', $input["idmeal"])->first();
        return response()->json($meal);
    }

    /**
     * Renvoie tous les Meals
     */
    public function getAllMeals()
    {
        $meals = MealLibrary::all();
        return response()->json($meals);
    }


    public function createMeal(Request $request)
    {
        $meal = new MealLibrary();
        //On left field name in DB and on right field name in Form/view
        $meal->id_meal_category = $request->input('idmealcategory');
        $meal->name = $request->input('name');
        $meal->save();


        $mealhf = new MealLibraryHasFood();
        $mealhf->id_meal = $meal->id_meal; 
        $mealhf->id_food = $request->input('idfood');
        $mealhf->save();

        //Todo boucle 

    }

    public function deleteMeal(Request $request)
    {
        $input = $request->all();
        $meal = MealLibrary::where('id_meal', $input["idmeal"])->first();
        $meal->delete();
    }
}
