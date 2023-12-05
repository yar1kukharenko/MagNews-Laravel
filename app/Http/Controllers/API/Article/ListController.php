<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Category\ListRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;

class ListController extends Controller
{
    public function __invoke(ListRequest $request)
    {

        $category_id = $request->query('category');
        if ($category_id !== null) {
            $articles = Article::where('category_id', $category_id)->get();
        } else {
            $articles = Article::all();
        }
        return ArticleResource::collection($articles);
    }
}
