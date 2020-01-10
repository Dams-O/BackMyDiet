<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Store;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        var_dump($user);

        
        $user->save();
        
    }
}
