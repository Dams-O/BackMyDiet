<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodLibraryResource;
use App\Models\FoodLibrary;


use Illuminate\Http\Request;

class FoodLibraryController extends Controller
{

    public function getFoodById(Request $request)
    {
        return FoodLibraryResource::collection(FoodLibrary::where('id_food', $request->input('id_food'))->get());
    }

    public function getFoodByLikeName(Request $request)
    {
        return FoodLibraryResource::collection(FoodLibrary::where('name', $request->input('name'))->orWhere('name', 'like', $request->input('name') . '%')->get());
        //->orWhere('name', 'like', $request->input('name') . '%')->get()
    }
    
    /**
     * Renvoie tous les Food
     */
    public function getAllFoods()
    {
        return FoodLibraryResource::collection(FoodLibrary::all());
    }


    public function createFood(Request $request)
    {
        $food = new FoodLibrary();
        //On left field name in DB and on right field name in Form/view
        $food->id_category = $request->input('id_category');
        $food->name = $request->input('name');
        $food->save();

        return response()->json([
            'code' => '200',
            'message' => "Food created"
        ]);
    }

    public function deleteFood(Request $request)
    {
        $input = $request->all();
        $food = FoodLibrary::where('id_food', $input["id_food"])->first();
        $food->delete();

        return response()->json([
            'code' => '200',
            'message' => "Food deleted"
        ]);
    }
}
