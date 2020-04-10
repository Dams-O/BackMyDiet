<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MealLibrary;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MealLibraryController extends Controller
{w

    public function addFoodPage() {
        if(!Auth::check()){ // if the user is disconnected, return the login page
            return view('front.login');
        } else {
            return view('addFood');
        }
    }

    public function search(Request $request) {
        function connect() {
            return new PDO('mysql:host=mysql-dams.alwaysdata.net;dbname=dams_mydiet', 'dams_adminwebser', '3rTx35CR9kTy', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        
        $pdo = connect();
        $keyword = '%'.$_POST['keyword'].'%';
        $sql = "SELECT * FROM food_library WHERE name LIKE (:keyword) ORDER BY id_food ASC LIMIT 0, 10";
        $query = $pdo->prepare($sql);
        $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchAll();
        foreach ($list as $rs) {
            // put in bold the written text
            $country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
            // add new option
            echo '<li onclick="set_item(\''.$rs['name'].'\')">'.$country_name.'</li>';
        }
    }

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
        exit; //à corriger
        $meal->save();
    }

    public function deleteMeal(Request $request)
    {
        $input = $request->all();
        $meal = MealLibrary::where('id_meal', $input["idmeal"])->first();
        $meal->delete();
    }
}
