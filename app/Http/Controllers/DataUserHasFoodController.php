<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataUserHasFood;

use Illuminate\Http\Request;

class DataUserHasFoodController extends Controller
{
    public function getDataUserHasFood(Request $request)
    {
        $input = $request->all();
        $dataUserHasFood = DataUser::where('id_user',$input["iduser"])->first();
        return response()->json($dataUserHasFood);
    }

    public function getDataUserHasFoodById(Request $request)
    {
        $input = $request->all();
        $dataUser = DataUser::where('id_data_user', $input["iddatauser"])->first();
        return response()->json($dataUser);
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
        $dataUser->save();
    }

    public function deleteDataUser(Request $request)
    {
        $input = $request->all();
        $dataUser = DataUser::where('id_data_user', $input["iddatauser"])->first();
        $dataUser->delete();
    }
}
