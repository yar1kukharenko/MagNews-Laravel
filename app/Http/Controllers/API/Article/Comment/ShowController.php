<?php

namespace App\Http\Controllers\API\Article\Comment;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        $comments = $article->comments()->latest()->get();
        return response()->json($comments);
    }
}
