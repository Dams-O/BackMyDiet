<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataUserResource;
use App\Models\DataUser;
use App\Models\DataUserHasFood;


use Illuminate\Http\Request;

class DataUserController extends Controller
{
    /**
     * @param Request $request
     * @return DataUserResource
     */
    public function getDataUserById(Request $request)
    {
        return DataUserResource::collection(DataUser::where('id_data_user', $request->input("id_data_user"))->get());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDataUserByIdADay(Request $request)
    {
        $input = $request->all();
        $dateNow = date('Y-m-d');
        $dataUser = DataUser::where('id_user', $input["id_user"])->get();
        $dataUserAday[] = NULL;
        foreach ($dataUser as &$data) {
            if ($data->created_at->format('Y-m-d') == $dateNow) {
                array_push($dataUserAday, $data);
            }
        }
        return DataUserResource::collection($dataUserAday);
    }


    /**
     * Renvoie tous les DataUsers d'un User
     * @param Request $request
     * @return DataUserResource
     */
    public function getAllDataUsersByUser(Request $request)
    {
        return DataUserResource::collection(DataUser::where('id_user', $request->input("id_user"))->all());
    }


    /**
     * Renvoie tous les DataUsers
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllDataUsers()
    {
        return DataUserResource::collection(DataUser::all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDataUser(Request $request)
    {
        $validateData = $request->validate([
            'date' => 'string'
        ]);

        $dataUser = new DataUser();
        //On left field name in DB and on right field name in Form/view
        $dataUser->id_user = $request->input('id_user');
        $dataUser->id_meal_category = $request->input('id_meal_category');
        if (isset($validateData['date'])) $dataUser->created_at = $validateData['date'];
        $dataUser->save();


        return response()->json([
            'code' => '200',
            'message' => "Data user created"
        ]);
        /*$dataUserHF->id_data_user = $dataUser->id_data_user;
        $dataUserHF->id_food = $request->input('idfood');
        var_dump($dataUserHF->id_data_user);
        var_dump($dataUserHF->id_food);
        $dataUserHF->save();*/
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDataUser(Request $request)
    {
        $dataUser = DataUser::where('id_data_user', $request->input("iddatauser"))->first();
        $dataUser->delete();

        return response()->json([
            'code' => '200',
            'message' => "Data user deleted"
        ]);
    }
}
