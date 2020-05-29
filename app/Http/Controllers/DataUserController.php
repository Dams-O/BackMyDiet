<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataUser;
use App\Models\DataUserHasFood;


use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function getDataUser(Request $request)
    {
        $input = $request->all();
        $dataUser = DataUser::where('id_user',$input["iduser"])->first();
        return response()->json($dataUser);
    }

    public function getDataUserById(Request $request)
    {
        $input = $request->all();
        $dataUser = DataUser::where('id_data_user', $input["iddatauser"])->first();
        return response()->json($dataUser);
    }

    public function getDataUserByIdADay(Request $request)
    {
        $input = $request->all();
        $dateNow = date('Y-m-d');
        var_dump($dateNow);
        //$dataUser = DataUser::where('id_user', $input["iduser"])->where('created_at', '>',$dateNow)->first();
        $dataUser = DataUser::where('id_user', $input["iduser"])->get();
        $dataUserAday[]= NULL;
        foreach($dataUser as &$data){
            var_dump($data->created_at->format('Y-m-d'));
            if($data->created_at->format('Y-m-d') == $dateNow){
                array_push($dataUserAday,$data);
            }
        }
        return response()->json($dataUserAday);
    }

      /**
     * Renvoie tous les DataUsers d'un User
     */
    public function getAllDataUsersByUser(Request $request)
    {
        $input = $request->all();
        $dataUsers = DataUser::where('id_user', $input["iduser"])->get();
        return response()->json($dataUsers);
    }


    /**
     * Renvoie tous les DataUsers
     */
    public function getAllDataUsers()
    {
        $dataUsers = DataUser::all();
        return response()->json($dataUsers);
    }


    public function createDataUser(Request $request)
    {
        $dataUser = new DataUser();
        //On left field name in DB and on right field name in Form/view
        $dataUser->id_user = $request->input('iduser');
        $dataUser->id_meal_category = $request->input('idmealcategory');
        $dataUser->save();

        foreach($request->input('idfood') as &$food){
            $dataUserHF = new DataUserHasFood();
            $dataUserHF->id_data_user = $dataUser->id_data_user;
            $dataUserHF->id_food = $food;
            $dataUserHF->save();
        }
        /*$dataUserHF->id_data_user = $dataUser->id_data_user; 
        $dataUserHF->id_food = $request->input('idfood');
        var_dump($dataUserHF->id_data_user);
        var_dump($dataUserHF->id_food);
        $dataUserHF->save();*/
    }

    public function deleteDataUser(Request $request)
    {
        $input = $request->all();
        $dataUser = DataUser::where('id_data_user', $input["iddatauser"])->first();
        $dataUser->delete();
    }
}
