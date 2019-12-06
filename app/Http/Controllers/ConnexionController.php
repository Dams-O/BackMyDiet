<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function loginGet()
    {
       return view('front.login'); 
    }

    public function loginPost()
    {
        $pseudo = $_GET['user'];
        return 'Le nom est ' . $pseudo;
    }
}