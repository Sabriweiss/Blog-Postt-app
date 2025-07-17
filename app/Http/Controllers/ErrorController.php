<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function showError(Post $post){

        if(auth()->id() !== $post->user_id) {
            return view('error-page');
        }    
    }
}