<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //custom login
    public function login(Request $request){
        $credential =[
            'email'=>"arif@gmail.com",
            "password"=>"12345678"
        ];
        if(Auth::attempt($credential)){
            return response("logged in",200);

        }else{
            return response("Not logged in",200);
            
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



    
}
