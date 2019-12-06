<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FoodLibrary;


use Illuminate\Http\Request;

class FoodLibraryController extends Controller
{
    public function getFood(Request $request)
    {
        $input = $request->all();
        $food = FoodLibrary::where('name',$input["name"])->first();
        return response()->json($food);
    }

    public function getFoodById(Request $request)
    {
        $input = $request->all();
        $food = FoodLibrary::where('id_food', $input["idfood"])->first();
        return response()->json($food);
    }

    /**
     * Renvoie tous les Food
     */
    public function getAllFoods()
    {
        $foods = FoodLibrary::all();
        return response()->json($foods);
    }


    public function createFood(Request $request)
    {
        $food = new FoodLibrary();
        //On left field name in DB and on right field name in Form/view
        $food->id_category = $request->input('idcategory');
        $food->name = $request->input('name');
        $food->save();
    }

    public function deleteFood(Request $request)
    {
        $input = $request->all();
        $food = FoodLibrary::where('id_food', $input["idfood"])->first();
        $food->delete();
    }
}
