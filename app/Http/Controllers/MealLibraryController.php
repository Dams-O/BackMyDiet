<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealLibraryResource;
use App\Models\MealLibrary;
use App\Models\MealLibraryHasFood;



use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MealLibraryController extends Controller
{

    public function addFoodPage()
    {
        return view('addFood');
    }


    public function getMealById(Request $request)
    {
        return MealLibraryResource::collection(MealLibrary::where('id_meal', $request->input('idmeal'))->get());
    }

    /**
     * Renvoie tous les Meals
     */
    public function getAllMeals()
    {
        return MealLibraryResource::collection(MealLibrary::all());
    }


    public function createMeal(Request $request)
    {
        $meal = new MealLibrary();
        //On left field name in DB and on right field name in Form/view
        $meal->id_meal_category = $request->input('id_meal_category');
        $meal->name = $request->input('name');
        $meal->save();

        return response()->json([
            'code' => '200',
            'message' => "Meal created"
        ]);
    }

    public function deleteMeal(Request $request)
    {
        $input = $request->all();
        $meal = MealLibrary::where('id_meal', $input["idmeal"])->first();
        $meal->delete();

        return response()->json([
            'code' => '200',
            'message' => "Meal deleted"
        ]);
    }
}
