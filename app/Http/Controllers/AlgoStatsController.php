<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use App\Models\User;

class AlgoStatsController extends Controller
{
    public static function getStatsByMonthByUser(Request $request)
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
            "all" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0, "Score" => 0]
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


            $mealTypeOneMonth['all']['Score'] += $mealTypeOneMonth[$menu->meal_category->name]['Score'];
        }

        $stats = [
            "date" => $month_target . "/" . $year_target,
            "user" => [$user->id_user, $user->mail],
            "month_stats" => $data_report,
            "goal" => $mealTypeOneMonth,
            "user_score" => $user_score,
            "goal_score" => $mealTypeOneMonth['all']['Score']
        ];

        return response()->json($stats);
    }

    public static function check_in_range($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        $check = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($start <= $check) && ($check <= $end));
    }

    public function getStatsByUser(Request $request)
    {
        //On récupère les cibles des stats
        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id_user|integer',
            'date' => 'string',
            'mode' => 'required|string'
        ]);

        //on stocke le mode et l'id de l'user
        $id = $validatedData['id_user'];
        $mode = $validatedData['mode'];

        //si on veut les stats sur 1 semaine
        if ($mode == "week") {
            //Si une date est précisée
            if (isset($validatedData['date'])) {
                $date_target = strtotime($validatedData['date']);
            } else {
                $date_target = strtotime(now());
            }

            if (date("l", $date_target) == "Monday") {
                $first_day_of_week = date('Y-m-d', strtotime("Last Monday", strtotime("+1 day", $date_target)));
            } else $first_day_of_week = date('Y-m-d', strtotime("Last Monday", $date_target));

            //on récupère le dernier jour
            $last_day_of_week = date('Y-m-d', strtotime("Next Sunday", $date_target));

            //Sinon (mode day)
        } else {
            //On recupère la date du jour
            if (isset($validatedData['date'])) {
                $date_target = date("Y-m-d", strtotime($validatedData['date']));
            } else {
                $date_target = date("Y-m-d", strtotime(now()));
            }
        }


        //Utilisateur voulu
        $user = User::where('id_user', $id)->first();


        //Tableau contenant le résultat de la recherche des datas user
        $data_report = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        //Tableau contenant les objectifs de cet Utilisateur
        $mealType = [
            "Petit Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Dejeune" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Diner" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0],
            "Colation" => ["Calcium" => 0, "Proteines" => 0, "Glucides" => 0, "Legumes" => 0, "Lipides" => 0, "Sucre" => 0]
        ];

        //Pour chaques datas User
        foreach ($user->dataUser as $data) {

            if ($mode == "day") {
                //On récupère les datas User entrés ce jour là
                if (date("Y-m-d", strtotime($data->created_at)) == $date_target) {
                    foreach ($data->foods as $food) {
                        //On ajoute +1 sur le bon field du tableau
                        $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                    }
                }

                //Sinon (mode week)
            } else {
                //on recupere les datas user situés dans l'intervalle de temps voulu
                if (AlgoStatsController::check_in_range($first_day_of_week, $last_day_of_week, $data->created_at)) {
                    foreach ($data->foods as $food) {
                        $data_report[$data->meal_category->name][$food->categorie->name] += 1;
                    }
                }
            }
        }

        if ($mode == "week") {
            $dim = 7;
        } else {
            $dim = 1;
        }


        //Ajout des objectifs (dim = nombre de jours)
        foreach ($user->menuTypes as $menu) {

            $mealType[$menu->meal_category->name]["Calcium"] += $menu->Calcium * $dim;
            $mealType[$menu->meal_category->name]["Proteines"] += $menu->Proteines * $dim;
            $mealType[$menu->meal_category->name]["Glucides"] += $menu->Glucides * $dim;
            $mealType[$menu->meal_category->name]["Legumes"] += $menu->Legumes * $dim;
            $mealType[$menu->meal_category->name]["Lipides"] += $menu->Lipides * $dim;
            $mealType[$menu->meal_category->name]["Sucre"] += $menu->Sucre * $dim;
        }


        //Format de réponse
        if ($mode == "week") {
            $stats = [
                "date" => [
                    "from" => $first_day_of_week,
                    "to" => $last_day_of_week
                ],
                "user" => [$user->id_user, $user->mail],
                "week_stats" => $data_report,
                "week_goal" => $mealType
            ];
        } else {
            $stats = [
                "date" => $date_target,
                "user" => [$user->id_user, $user->mail],
                "day_stats" => $data_report,
                "day_goal" => $mealType
            ];
        }

        return response()->json($stats);
    }
}
