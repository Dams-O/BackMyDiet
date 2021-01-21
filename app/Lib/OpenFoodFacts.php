<?php

namespace App\Lib;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\BadRequestException;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

class OpenFoodFacts extends Api
{
    // Filtres pour détecter les données incorrectes
    private $wrong_data_tags = array(
        'carbohydrates' => array(
            'en:nutrition-value-very-low-for-category-carbohydrates',
            'en:nutrition-value-very-high-for-category-carbohydrates',
        ),
        'energy' => array(
            'en:nutrition-value-very-low-for-category-energy',
            'en:nutrition-value-very-high-for-category-energy',
        ),
        'fat' => array(
            'en:nutrition-value-very-low-for-category-fat',
            'en:nutrition-value-very-high-for-category-fat',
        ),
        'fiber' => array(
            'en:nutrition-value-very-low-for-category-fiber',
            'en:nutrition-value-very-high-for-category-fiber',
        ),
        'proteins' => array(
            'en:nutrition-value-very-low-for-category-proteins',
            'en:nutrition-value-very-high-for-category-proteins',
        ),
        'sodium' => array(
            'en:nutrition-value-very-low-for-category-sodium',
            'en:nutrition-value-very-high-for-category-sodium',
        ),
        'saturated-fat' => array(
            'en:nutrition-value-very-low-for-category-saturated-fat',
            'en:nutrition-value-very-high-for-category-saturated-fat',
        ),
        'global' => array(
            'en:nutrition-saturated-fat-greater-than-fat',
            'en:no-nutrition-data',
            'en:nutrition-all-values-zero'
        )
    );

    /**
     * OpenFoodFacts constructor.
     * @param string $api
     * @param string $geography
     * @param LoggerInterface|null $logger
     * @param ClientInterface|null $clientInterface
     * @param CacheInterface|null $cacheInterface
     */
    public function __construct($api = 'food', $geography = 'world', LoggerInterface $logger = null, ClientInterface $clientInterface = null, CacheInterface $cacheInterface = null)
    {
        parent::__construct($api, $geography, $logger, $clientInterface, $cacheInterface);
    }

    // Calcule la médiane
    public function median($numbers)
    {
        sort($numbers);
        $totalNumbers = count($numbers);
        $mid = floor($totalNumbers / 2);

        return ($totalNumbers % 2) === 0 ? ($numbers[$mid - 1] + $numbers[$mid]) / 2 : $numbers[$mid];
    }

    // Ignore les produits dont les données sont incorrectes
    private function filterWrongData($product, $filter = 'global')
    {
        if (array_key_exists('data_quality_tags', $product)) {
            foreach ($this->wrong_data_tags[$filter] as $wrong_data_tag) {
                if(in_array($wrong_data_tag, $product['data_quality_tags'])) return null;
            }
        }

        return $product;
    }

    // Override de la méthode getAllByFacet() de la classe mère qui ne récupère que les produits de la première page
    // Ici on récupère la liste des produits de toutes les pages
    public function getAllByFacet($query, $filter_wrong_data = false)
    {
        $count = parent::getByFacets($query)->searchCount();
        $pages = range(1, ceil($count / 24));

        foreach ($pages as $page) {

            $products = parent::getByFacets($query, $page);

            foreach ($products as $product) {

                if($filter_wrong_data) {
                    $product = $this->filterWrongData($product->getData());
                }
                else {
                    $product = $product->getData();
                }

                if($product) {
                    $all_products[$product['_id']] = $product;
                }
            }
        }

        return $all_products;
    }

    // Retourne la médiane et la moyenne de glucides pour un groupe de produits
    public function getCarbohydrates($products)
    {
        foreach ($products as $id => $product) {

            $product = $this->filterWrongData($product, 'carbohydrates');

            if($product) {
                if(count($product['nutriments']) && array_key_exists('carbohydrates', $product['nutriments'])) {
                    if($product['nutriments']['carbohydrates'] != 0) {
                        $carbohydrates[$id] = $product['nutriments']['carbohydrates'];
                    }
                }
            }
        }

        if(isset($carbohydrates)) {
            $average = array_sum($carbohydrates) / count($carbohydrates);
            $median = $this->median($carbohydrates);
        }
        else {
            $average = 0;
            $median = 0;
        }

        return array('average' => round($average, 3), 'median' => round($median, 3), 'unit' => 'g');
    }

    // Retourne la médiane et la moyenne de lipides pour un groupe de produits
    public function getFat($products)
    {
        foreach ($products as $id => $product) {

            $product = $this->filterWrongData($product, 'fat');

            if($product) {
                if(count($product['nutriments']) && array_key_exists('fat', $product['nutriments'])) {
                    if($product['nutriments']['fat'] != 0) {
                        $fat[$id] = $product['nutriments']['fat'];
                    }
                }
            }
        }

        if(isset($fat)) {
            $average = array_sum($fat) / count($fat);
            $median = $this->median($fat);
        }
        else {
            $average = 0;
            $median = 0;
        }

        return array('average' => round($average, 3) , 'median' => round($median, 3), 'unit' => 'g');
    }

    // Retourne la médiane et la moyenne des protéines pour un groupe de produits
    public function getProteins($products)
    {
        foreach ($products as $id => $product) {
            $product = $this->filterWrongData($product, 'proteins');

            if($product) {
                if(count($product['nutriments']) && array_key_exists('proteins', $product['nutriments'])) {
                    if($product['nutriments']['proteins'] != 0) {
                        $proteins[$id] = $product['nutriments']['proteins'];
                    }
                }
            }
        }

        if(isset($proteins)) {
            $average = array_sum($proteins) / count($proteins);
            $median = $this->median($proteins);
        }
        else {
            $average = 0;
            $median = 0;
        }

        return array('average' => round($average, 3) , 'median' => round($median, 3), 'unit' => 'g');
    }

    // Retourne la médiane et la moyenne de sodium pour un groupe de produits
    public function getSodium($products)
    {
        foreach ($products as $id => $product) {
            $product = $this->filterWrongData($product, 'sodium');

            if($product) {
                if(count($product['nutriments']) && array_key_exists('sodium', $product['nutriments'])) {
                    if($product['nutriments']['sodium'] != 0) {
                        $sodium[$id] = $product['nutriments']['sodium'];
                    }
                }
            }
        }

        if(isset($sodium)) {
            $average = array_sum($sodium) / count($sodium);
            $median = $this->median($sodium);
        }
        else {
            $average = 0;
            $median = 0;
        }

        return array('average' => round($average, 3) , 'median' => round($median, 3), 'unit' => 'g');
    }

    // Retourne la médiane et la moyenne de l'énergie pour un groupe de produits
    public function getEnergy($products)
    {
        foreach ($products as $id => $product) {

            if($product) {
                if(count($product['nutriments']) && array_key_exists('energy-kcal', $product['nutriments'])) {
                    if($product['nutriments']['energy-kcal'] != 0) {
                        $energy[$id] = $product['nutriments']['energy-kcal'];
                    }
                }
            }
        }


        if(isset($energy)) {
            $average = array_sum($energy) / count($energy);
            $median = $this->median($energy);
        }
        else {
            $average = 0;
            $median = 0;
        }
        return array('average' => round($average, 3) , 'median' => round($median, 3), 'unit' => 'kcal');
    }

    // Récupère la liste des catégories de produits d'OpenFoodFacts
    public function getCategories()
    {
        return $this->fetch('https://fr.openfoodfacts.org/categories', true);
    }

    /**
     * This private function do a http request
     * @param string $url the url to fetch
     * @param boolean $isJsonFile the request must be finish by '.json' ?
     * @return array               return the result of the request in array format
     * @throws InvalidArgumentException
     * @throws BadRequestException
     */
    private function fetch($url, $isJsonFile = true)
    {
        $url .= ($isJsonFile ? '.json' : '');
        $realUrl = $url;
        $cacheKey = md5($realUrl);

        if (!empty($this->cache) && $this->cache->has($cacheKey)) {
            $cachedResult = $this->cache->get($cacheKey);
            return $cachedResult;
        }

        $data = [
            'on_stats' => function (TransferStats $stats) use (&$realUrl) {
                // this function help to find redirection
                // On redirect we lost some parameters like page
                $realUrl = (string)$stats->getEffectiveUri();
            }
        ];
        if ($this->auth) {
            $data['auth'] = array_values($this->auth);
        }

        try {
            $response = $this->httpClient->request('get', $url, $data);
        } catch (GuzzleException $guzzleException) {
            $this->logger->warning(sprintf('OpenFoodFact - fetch - failed - GET : %s', $url), ['exception' => $guzzleException]);
            //TODO: What to do on a error? - return empty array?
            $exception = new BadRequestException($guzzleException->getMessage(), $guzzleException->getCode(), $guzzleException);

            throw $exception;
        }

        if ($realUrl !== $url) {
            $this->logger->warning('OpenFoodFact - The url : ' . $url . ' has been redirect to ' . $realUrl);
            trigger_error('OpenFoodFact - Your request has been redirect');
        }

        $this->logger->info('OpenFoodFact - fetch - GET : ' . $url . ' - ' . $response->getStatusCode());
        $jsonResult = json_decode($response->getBody(), true);

        if (!empty($this->cache) && !empty($jsonResult)) {
            $this->cache->set($cacheKey, $jsonResult);
        }

        return $jsonResult;
    }
}
