<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name'=> ['required','min:3','max:20',Rule::unique('user_data','name')],
            'password'=> ['required','min:8','max:200'],
            'email'=> ['required','email',Rule::unique('user_data','email')]
        ]);
        
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
       $user = User::create($incomingFields);
       auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created successfully!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();

        return redirect('/');
    }

        return back()->withErrors(['loginname' => 'Invalid credentials'])->onlyInput('loginname');
    }
}