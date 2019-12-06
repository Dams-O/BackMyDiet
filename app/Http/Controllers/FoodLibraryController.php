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
}