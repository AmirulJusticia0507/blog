<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required'
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id')
        ]);

        return redirect()->route('posts.show', $request->input('post_id'));
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment->update([
            'content' => $request->input('content')
        ]);

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post->id;
        $comment->delete();

        return redirect()->route('posts.show', $postId);
    }
}
