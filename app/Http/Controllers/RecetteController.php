<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function showPage(){
        return view('addRecette');
    }

    public function showMenuPage(){
        return view('menu');
    }
}
