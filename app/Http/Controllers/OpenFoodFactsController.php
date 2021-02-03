<?php

namespace App\Http\Controllers;

use App\Lib\OpenFoodFacts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpenFoodFactsController extends Controller
{
    public function getAllProducts(Request $request)
    {
        // On récupère les catégories depuis l'API française
        $api = new OpenFoodFacts('food', 'fr');
        $categories = $api->getCategories();
        $data = array('cats' => $categories['tags']);

        if($request->input('category')) {
            $category_id = $request->input('category');
            $api_lang = 'fr'; // 'world' ou 'fr'

            switch($api_lang) {
                case 'world':
                    // On récupère les données des produits depuis l'API internationale pour avoir un plus grand échantillon de données
                    $api = new OpenFoodFacts('food', $api_lang);
                    $products = $api->getAllByFacet(array('category' => substr($category_id, 3, strlen($category_id)), true));
                    $data['nutriments']['Glucides'] = $api->getCarbohydrates($products);
                    $data['nutriments']['Lipides'] = $api->getFat($products);
                    $data['nutriments']['Protéines'] = $api->getProteins($products);
                    $data['nutriments']['Sodium'] = $api->getSodium($products);
                    $data['nutriments']['Énergie'] = $api->getEnergy($products);
                    break;
                case 'fr':
                    // On récupère les données des produits depuis l'API française pour avoir un plus petit échantillon mais plus fiable puisqu'il intègre uniquement les produits consommés en france
                    $api = new OpenFoodFacts('food', $api_lang);
                    $products = $api->getAllByFacet(array('category' => Str::of($category_id)->slug('-')), true);
                    $data['nutriments']['Glucides'] = $api->getCarbohydrates($products);
                    $data['nutriments']['Lipides'] = $api->getFat($products);
                    $data['nutriments']['Protéines'] = $api->getProteins($products);
                    $data['nutriments']['Sodium'] = $api->getSodium($products);
                    $data['nutriments']['Énergie'] = $api->getEnergy($products);
                    break;
            }
        }

        return view('openFoodFacts', $data);
    }

    public function getProductData($categorie)
    {

    }
}
