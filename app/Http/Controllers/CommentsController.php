<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index() {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('comments', ['comments' => $comments]);
    }

    public function create() {

        if (\Auth::user() == null) {
            return redirect('login');
        }

        $comment = new Comment;

        return view('commentsForm', ['comment' => $comment]);
    }

    public function store(Request $request) {

        $this->validate($request, ['message' => 'required|min:10|max:255',]);

        if (\Auth::user() == null) {
            return redirect('login');
        }

        $comment = new Comment();
        $comment->user_id = \Auth::user()->id; 
        $comment->message = $request->message;

        if ($comment->save()) {
            return redirect('comments');
        }
        return view('comments');
    }

    public function edit($id) {

        $comment = Comment::find($id); 

        if (\Auth::user()->id != $comment->user_id && \Auth::user()->status != 'admin') {
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        return view('commentsEditForm', ['comment'=>$comment]);
    }

    public function update(Request $request, $id) {

        $comment = Comment::find($id);
        $this->validate($request, 
            ['message' => 'required|min:10|max:255',]);

        if (\Auth::user()->id != $comment->user_id && \Auth::user()->status != 'admin') {
            return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $comment->message = $request->message;
        
        if($comment->save()) {
            return redirect()->route('comments');
        }

        return "Wystąpił błąd.";
    }
            

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (\Auth::user()->id != $comment->user_id && \Auth::user()->status != 'admin') {
            return back();
        }
        if($comment->delete()) {
            return redirect()->route('comments');
        }
        else 
            return back();
    }
    
}
