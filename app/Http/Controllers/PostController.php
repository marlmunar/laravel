<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
     public function createPost(CreatePostRequest $request) {
        $validated = $request->validated();

        $validated['title'] = strip_tags( $validated['title']);
        $validated['body'] = strip_tags( $validated['body']);
        $validated['user_id'] = Auth::id();

        Post::create($validated);
        
        return redirect('/');
    }
}
