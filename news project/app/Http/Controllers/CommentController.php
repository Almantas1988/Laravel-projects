<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        //
        $comment = Comment::all();

        return view('news.index', compact('comment'));
    }


    public function create()
    {
        //
        return view('news.create');
    }

    public function store(Request $request)
    {
        //
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->news_id = $request->input('news_id');
        $comment->comment_text = $request->input('content');

        $comment->save();

        session()->flash('message', 'Komentaras sekmingai pridetas');

        return redirect()->route('news.show',  $comment->news_id);

    }

    public function show($id)
    {
        //
        $comment = Comment::find($id);
        return view('news.show', compact(['comment']));
    }

    public function edit($id)
    {
        //
        $comment = Comment::find($id);

        return view('news.editComment', compact('comment'));
    }


    public function update(Request $request, $id)
    {
        //
        $comment = Comment::find($id);
        $comment->comment_text = $request->input('content');

        $comment->save();

        session()->flash('message', 'Komentaras sekmingai paredaguotas');

        return redirect()->route('news.show', $comment->user_id);

    }

    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();

        session()->flash('message', 'Komentaras sekmingai istrintas');

        return redirect()->back();
    }
}
