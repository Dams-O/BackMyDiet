<?php

namespace App\Console\Commands;

use App\Models\OpenFoodFacts as OpenFoodFactsModel;
use Illuminate\Console\Command;
use App\Lib\OpenFoodFacts as OpenFoodFactsLib;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Str;
use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\BadRequestException;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

class OpenFoodFacts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openfoodfacts:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows you to get all categories from OpenFoodFacts.org';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $api = new OpenFoodFactsLib('food', 'fr');
        $categories = $api->getCategories()['tags'];
        $i = 1;

        // On sauvegarde les informations en BDD
        foreach ($categories as $category) {
            OpenFoodFactsModel::updateOrCreate(
                array(
                    'category_id' => Str::of($category['name'])->slug('-'),
                    'name' => $category['name'],
                ),
                array(
                    'nb_products' => $category['products']
                )
            );

            $i++;
        }

        echo "$i insertions";
        return;
    }
}
