<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;

class DeleteController extends BaseController
{
    public function __invoke(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index');
    }
}
