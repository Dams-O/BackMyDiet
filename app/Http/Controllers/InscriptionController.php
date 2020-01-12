<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function form(){
        return view('front.formulaire');

    } 

    public function register(Request $request){
        $input = $request->all();
        $user = new User; 
        $user->last_name = $input['last_name'];
        $user->first_name = $input['first_name'];
        $user->pseudo = $input['user'];
        $user->mail = $input['mail'];
        $user->password = $input['pass'];
        $user->save();
        $sucess = 1;
        return view('front.login')->with('sucess', $sucess);
    }
}
