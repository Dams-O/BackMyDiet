<?php

namespace App\Http\Controllers;

use App\Http\Resources\OpenFoodFactsResource;
use App\Lib\OpenFoodFacts;
use App\Models\OpenFoodFacts as OpenFoodFactsModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpenFoodFactsController extends Controller
{
    public function viewCategories(Request $request)
    {
        // On récupère toutes les catégories
        $data['categories'] = $this->getCategories();

        if($request->input('category')) {

            $category_id = Str::of($request->input('category'))->slug('-');
            $name = $request->input('category');

            // Si on a les infos dans notre BDD sinon on les récupère depuis OpenFoodFacts
            if (OpenFoodFactsModel::findByCategoryId($category_id)->get()->count() && OpenFoodFactsModel::findByCategoryId($category_id)->first()->moy_glucides) {
                $open_food_facts_library = OpenFoodFactsModel::findByCategoryId($category_id)->first();

                $data['nutriments']['Glucides'] = array(
                    'average' => $open_food_facts_library->moy_glucides,
                    'median' => $open_food_facts_library->med_glucides,
                    'unit' => 'g'
                );

                $data['nutriments']['Lipides'] = array(
                    'average' => $open_food_facts_library->moy_lipides,
                    'median' => $open_food_facts_library->med_lipides,
                    'unit' => 'g'
                );

                $data['nutriments']['Protéines'] = array(
                    'average' => $open_food_facts_library->moy_proteines,
                    'median' => $open_food_facts_library->med_proteines,
                    'unit' => 'g'
                );

                $data['nutriments']['Sodium'] = array(
                    'average' => $open_food_facts_library->moy_sodium,
                    'median' => $open_food_facts_library->med_sodium,
                    'unit' => 'g'
                );

                $data['nutriments']['Énergie'] = array(
                    'average' => $open_food_facts_library->moy_energie,
                    'median' => $open_food_facts_library->med_energie,
                    'unit' => 'kcal'
                );
            } else {
                $api = new OpenFoodFacts('food', 'fr'); // 'world' ou 'fr'
                $products = $api->getAllByFacet(array('category' => Str::of($category_id)->slug('-')), true);
                $data['nutriments']['Glucides'] = $api->getCarbohydrates($products);
                $data['nutriments']['Lipides'] = $api->getFat($products);
                $data['nutriments']['Protéines'] = $api->getProteins($products);
                $data['nutriments']['Sodium'] = $api->getSodium($products);
                $data['nutriments']['Énergie'] = $api->getEnergy($products);

                // On sauvegarde les informations en BDD
                OpenFoodFactsModel::updateOrCreate(
                    array(
                        'category_id' => $category_id,
                        'name' => $name,
                    ),
                    array(
                        'moy_glucides' => $data['nutriments']['Glucides']['average'],
                        'moy_lipides' => $data['nutriments']['Lipides']['average'],
                        'moy_proteines' => $data['nutriments']['Protéines']['average'],
                        'moy_sodium' => $data['nutriments']['Sodium']['average'],
                        'moy_energie' => $data['nutriments']['Énergie']['average'],
                        'med_glucides' => $data['nutriments']['Glucides']['median'],
                        'med_lipides' => $data['nutriments']['Lipides']['median'],
                        'med_proteines' => $data['nutriments']['Protéines']['median'],
                        'med_sodium' => $data['nutriments']['Sodium']['median'],
                        'med_energie' => $data['nutriments']['Énergie']['median']
                    )
                );
            }
        }

        return view('openFoodFacts', $data);
    }

    private function getCategories()
    {
        // On récupère les catégories de notre BDD sinon on va les chercher sur Open Food Facts
        if(OpenFoodFactsModel::get()->count()) {
            foreach (OpenFoodFactsModel::get() as $category) {
                $categories[] = array(
                    'id' => $category->category_id,
                    'name' => $category->name,
                    'nb_products' => $category->nb_products
                );
            }
        }
        else {
            $api = new OpenFoodFacts('food', 'fr');

            foreach ($api->getCategories()['tags'] as $category) {
                $categories[] = array(
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'nb_products' => $category['products']
                );
            }
        }

        return $categories;
    }

    /**
     * @param Request $request
     * @return string Toutes les catégories correspondant à $search
     * @example La recherche "carotte" retournera "Carottes", "Jus de carotte", "Carottes en conserve", etc...
     */
    public function searchCategory(Request $request)
    {
        if($request->input('search')) {
            return OpenFoodFactsModel::search($request->input('search'))->get();
        }
    }

    /**
     * @param Request $request
     * @return string Les informations nutritionnelles d'une catégorie
     */
    public function getNutriments(Request $request)
    {
        if($request->input('category_id')) {
            return OpenFoodFactsModel::findByCategoryId($request->input('category_id'))->first();
        }
    }
}
