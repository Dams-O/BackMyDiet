<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AlgoController extends Controller
{
    public function getStatsByMonth()
    {
        $users = User::all();

        $date_target = date("d-m-Y", strtotime("-1 month"));
        $month_target = date("m", strtotime($date_target));
        $year_target = date("Y", strtotime($date_target));


        $all_stats = [];

        foreach($users as $user)
        {
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

            array_push($all_stats, $stats);
        }
        return response()->json($all_stats);
    }
}
