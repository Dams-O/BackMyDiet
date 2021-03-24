<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use App\Models\User;

class AlgoController extends Controller
{
    public static function getStatsByMonthByUserByUser(Request $request)
    {


        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user|integer',
            'date' => 'string'
        ]);



        $user = User::where('id_user', $validatedData['id_user'])->first();

        if (!isset($user)) {
            return response()->json([
                'error' => 'utilisateur introuvable'
            ]);
        }


        //Selection du mois concerné
        if (isset($validatedData['date'])) {
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
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "all" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        $mealTypeOneMonth = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0],
            "all" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        $user_score = 0;

        //Nombre de jours dans le mois
        $dim = cal_days_in_month(CAL_GREGORIAN, $month_target, $year_target);

        foreach ($datas_user as $data) {
            //On sélectionne les data user du mois concerné
            if (date("m", strtotime($data->created_at)) == $month_target) {
                //Attribution des points selon la categorie des aliments présents dans le dataUser
                foreach ($data->foods as $food) {
                    $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                    $data_report[$data->meal_category->name]["Score"] += 1;
                    $user_score += 1;
                    $data_report['all'][$food->categorie->name] += 1;
                }
            }
        }

        $goal_score = 0;

        //Sélection de tous les menus type de l'utilisateur
        foreach ($user->menuTypes as $menu) {
            //Attribution des points par catégorie d'aliments, multipliés par le nombre de jours dans le mois
            $mealTypeOneMonth[$menu->meal_category->name]["Calcium"] += $menu->Calcium * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Proteines"] += $menu->Proteines * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Glucides"] += $menu->Glucides * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Legumes"] += $menu->Legumes * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Lipides"] += $menu->Lipides * $dim;
            $mealTypeOneMonth[$menu->meal_category->name]["Sucre"] += $menu->Sucre * $dim;

            $mealTypeOneMonth['all']["Calcium"] += $menu->Calcium * $dim;
            $mealTypeOneMonth['all']["Proteines"] += $menu->Proteines * $dim;
            $mealTypeOneMonth['all']["Glucides"] += $menu->Glucides * $dim;
            $mealTypeOneMonth['all']["Legumes"] += $menu->Legumes * $dim;
            $mealTypeOneMonth['all']["Lipides"] += $menu->Lipides * $dim;
            $mealTypeOneMonth['all']["Sucre"] += $menu->Sucre * $dim;

            $mealTypeOneMonth[$menu->meal_category->name]["Score"] = $menu->Sucre * $dim + $menu->Sucre * $dim + $menu->Lipides * $dim + $menu->Legumes * $dim + $menu->Glucides * $dim + $menu->Proteines * $dim + $menu->Calcium * $dim;
            $goal_score += $mealTypeOneMonth[$menu->meal_category->name]["Score"];
        }

        $stats = [
            "date" => $month_target . "/" . $year_target,
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

        if (isset($validatedData['date'])) {
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

        foreach ($user->dataUser as $data) {
            if (date("Y-m-d", strtotime($data->created_at)) == $date_target) {
                foreach ($data->foods as $food) {
                    $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                }
            }
        }

        foreach ($user->menuTypes as $menu) {

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
