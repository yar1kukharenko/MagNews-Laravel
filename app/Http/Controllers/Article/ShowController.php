<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;

class ShowController extends BaseController
{
    public function __invoke(Article $article)
    {
        return view('article.show', compact('article'));
    }
}
