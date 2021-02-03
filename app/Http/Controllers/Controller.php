<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(title="API Mydiet", 
 *          version="1",
 * )
 * @OA\Server(
 *      url="https://webmydiet-env.eba-bmajpt3n.eu-west-3.elasticbeanstalk.com",
 *      description="Api MyDiet",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}