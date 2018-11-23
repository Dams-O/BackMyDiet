<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menu Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function getmenu(){
        toto::where()->get();
    }
}
