<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use App\Models\User;

class AlgoController extends Controller
{
    public function getStatsByMonthByUserByUser(Request $request)
    {

        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user|integer',
            'date' => 'string'
        ]);

        $user = User::where('id_user', $validatedData['id_user']);

        if(!isset($user))
        {
            return response()->json([
                'error' => 'utilisateur introuvable'
            ]);
        }

        if(isset($validatedData['date']))
        {
            $month_target = date("m", strtotime($validatedData['date']));
            $year_target = date("Y", strtotime($validatedData['date']));
        } else {
            $date_target = date("d-m-Y", strtotime("-1 month"));
            $month_target = date("m", strtotime($date_target));
            $year_target = date("Y", strtotime($date_target));
        }


        $datas_user = $user->dataUser;

        $data_report = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0]
        ];

        $mealTypeOneMonth = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0]
        ];

        $user_score = 0;

        $dim = cal_days_in_month(CAL_GREGORIAN, $month_target, $year_target);
        
        foreach($datas_user as $data)
        {  
            if(date("m", strtotime($data->created_at)) == $month_target)
            {
                foreach($data->foods as $food)
                {
                    $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                    $data_report[$data->meal_category->name]["Score"] += 1;
                    $user_score += 1;
                }
            }
        }

        $goal_score = 0;
            
        foreach($user->menuTypes as $menu)
        {
                
            $mealTypeOneMonth[$menu->meal_category->name]["Calcium"] += $menu->Calcium * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Proteines"] += $menu->Proteines * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Glucides"] += $menu->Glucides * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Legumes"] += $menu->Legumes * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Lipides"] += $menu->Lipides * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Sucre"] += $menu->Sucre * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Score"] = $menu->Sucre * $dim + $menu->Sucre * $dim + $menu->Lipides * $dim + $menu->Legumes * $dim + $menu->Glucides * $dim + $menu->Proteines * $dim + $menu->Calcium * $dim;
            $goal_score += $mealTypeOneMonth[$menu->meal_category->name]["Score"];
        }

        $stats = [
            "date" => $month_target."/".$year_target,
            "user" => [$user->id_user, $user->mail],
            "month_stats" => $data_report,
            "goal" => $mealTypeOneMonth,
            "user_score" => $user_score,
            "goal_score" => $goal_score
        ];
        
        return response()->json($stats);
    }

    public function getStatsByDayByUser(Request $request)
    {

        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user|integer',
            'date' => 'string'
        ]);

        $id = $validatedData['id_user'];
        
        if(isset($validatedData['date']))
        {
            $date_target = date("Y-m-d", strtotime($validatedData['date']));
        } else {
            $date_target = date("Y-m-d", strtotime(now()));
        }

        $user = User::where('id_user', $id)->first();

        $data_report = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        $mealTypeOneDay = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        foreach($user->dataUser as $data)
        {
            if(date("Y-m-d", strtotime($data->created_at)) == $date_target)
            {
                foreach($data->foods as $food)
                {
                    $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                }
            }
        }
        
        

        foreach($user->menuTypes as $menu)
        {
                
            $mealTypeOneDay[$menu->meal_category->name]["Calcium"] += $menu->Calcium;
            $mealTypeOneDay[$menu->meal_category->name]["Proteines"] += $menu->Proteines;
            $mealTypeOneDay[$menu->meal_category->name]["Glucides"] += $menu->Glucides;
            $mealTypeOneDay[$menu->meal_category->name]["Legumes"] += $menu->Legumes;
            $mealTypeOneDay[$menu->meal_category->name]["Lipides"] += $menu->Lipides;
            $mealTypeOneDay[$menu->meal_category->name]["Sucre"] += $menu->Sucre;
               
        }

        $stats = [
            "date" => $date_target,
            "user" => [$user->id_user, $user->mail],
            "day_stats" => $data_report,
            "day_goal" => $mealTypeOneDay
        ];

        return response()->json($stats);
    }
}
