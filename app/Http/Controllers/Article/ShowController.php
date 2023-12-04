<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;

class ShowController extends BaseController
{
    public function __invoke(Article $article)
    {
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->get()
            ->take(3);
        return view('article.show', compact('article'));
    }
}
