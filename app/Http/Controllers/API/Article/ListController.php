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
        $start = $request->query('start');
        $end = $request->query('end');

        $query = Article::query();
        if ($category_id !== null) {
            $query->where('category_id', $category_id);
        }
        if ($start !== null && $end !== null) {
            $query->whereBetween('id', [$start, $end]);

        } elseif ($start !== null) {
            $query->where('id', '>=', $start);
        } elseif ($end !== null) {
            $query->where('id', '<=', $end);
        }
        $articles = $query->get();
        return ArticleResource::collection($articles);
    }
}
