<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{   




    public function deletePost(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return view('error-page');
        }

        $post->delete();
        return redirect('/')->with('success', 'Post deleted successfully!');
    }
    
    public function updatePost(Request $request, Post $post)
    {
        if(auth()->id() !== $post->user_id) {
            return view('error-page');
        }
        
        $incomingFields = $request->validate([
            'title' => 'required',
            'body'=>'required',
        ]);
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);

            $post->update($incomingFields);
            return redirect('/');
    }


    public function editPost(Post $post)
    {   
        if(auth()->id() !== $post->user_id) {
            return view('error-page');
        }

        return view('edit-post', ['post' => $post]);

    }
    
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect('/');
    }
}
