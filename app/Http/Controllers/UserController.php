<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomngFields = $request->validate([
            'name'=> ['required','min:3','max:10'],
            'password'=> ['required','min:8','max:200'],
            'email'=> ['required','email']
            
            

        ]);
        
        return 'you are registered successfully';
    }
}
