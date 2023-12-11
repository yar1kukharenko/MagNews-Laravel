<?php

namespace App\Http\Controllers\Article\Comment;

use App\Http\Controllers\Article\BaseController;
use App\Models\Comment;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $comments = Comment::where('is_approved', false)->orderBy('created_at', 'desc')->get();
        return view('comment.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true;
        $comment->save();
        return redirect()->route('comment.index')->with('success', 'Комментарий одобрен');

    }

    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comment.index')->with('success', 'Комментарий отклонен');
    }
}
