<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function publicMessage(){
        return response("this is for everyone",200);
    }

    public function secretMessage(Request $request){

        if(!auth()->check()){
           // return response("You are not logged in",401);
           abort(403,'please log in');
        }
        return response("this is for logged in users",200);
    }

    // custom login
    public function login(){
        $credential =[
            'email'=>
        ]
    }



    
}
