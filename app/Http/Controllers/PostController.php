<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function updatePost(Post $post, UpdatePostRequest $request) {
        if(Auth::user()->id !== $post->user_id) {
            return redirect('/');
        }

        $validated = $request->validated();

        $validated['title'] = strip_tags( $validated['title']);
        $validated['body'] = strip_tags( $validated['body']);

        $post->update($validated);
        
        return redirect('/');
    }
    
    public function getEditScreen(Post $post) {
        if(Auth::user()->id !== $post->user_id) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(CreatePostRequest $request) {
        $validated = $request->validated();

        $validated['title'] = strip_tags( $validated['title']);
        $validated['body'] = strip_tags( $validated['body']);
        $validated['user_id'] = Auth::id();

        Post::create($validated);
        
        return redirect('/');
    }
}
