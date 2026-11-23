<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user:id,name,email,status')->orderBy('created_at', 'desc')->get();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->message = $validated['message'];
        $comment->save();

        return response()->json($comment->load('user:id,name,email,status'), 201);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Opinia nie została znaleziona.'], 404);
        }

        if ($request->user()->id !== $comment->user_id && $request->user()->status !== 'admin') {
            return response()->json(['message' => 'Brak uprawnień do edycji tej opinii.'], 403);
        }

        $validated = $request->validate([
            'message' => 'required|string|min:5|max:255',
        ]);

        $comment->message = $validated['message'];
        $comment->save();

        return response()->json($comment->load('user:id,name,email,status'));
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Opinia nie została znaleziona.'], 404);
        }

        if ($request->user()->id !== $comment->user_id && $request->user()->status !== 'admin') {
            return response()->json(['message' => 'Brak uprawnień do usunięcia tej opinii.'], 403);
        }

        $comment->delete();
        return response()->json(['message' => 'Opinia usunięta pomyślnie.']);
    }
}
