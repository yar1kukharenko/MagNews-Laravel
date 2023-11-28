<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\API\Category\ListRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;

class ListController extends Controller
{
    public function __invoke(ListRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $articles = Article::filter($filter)->get();
        return ArticleResource::collection($articles);
    }
}
