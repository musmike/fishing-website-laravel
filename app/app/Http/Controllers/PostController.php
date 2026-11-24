<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('created_at')->take(4)->get();
        return view('welcome', compact('posts'));
    }

    public function getMorePosts(Request $request)
    {
        $skip = $request->input('skip', 0);
        $posts = Post::latest()->skip($skip)->take(4)->get();
        
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('showPost', compact('post'));
    }
}
