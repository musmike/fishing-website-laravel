<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) $request->input('skip', 0);
        $take = (int) $request->input('take', 4);

        $posts = Post::latest('created_at')->skip($skip)->take($take)->get();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Wpis nie został znaleziony.'], 404);
        }
        return response()->json($post);
    }
}
