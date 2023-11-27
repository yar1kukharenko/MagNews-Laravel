<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;

class ListController extends Controller
{
    public function __invoke()
    {
        $articles = Article::all();
        return ArticleResource::collection($articles);
    }
}
