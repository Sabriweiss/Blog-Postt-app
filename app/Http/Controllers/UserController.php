<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name'=> ['required','min:3','max:20'],
            'password'=> ['required','min:8','max:200'],
            'email'=> ['required','email']
            
            

        ]);
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        dd($incomingFields);
        User::create($incomingFields);

        return 'you are registered successfully';
    }
}
