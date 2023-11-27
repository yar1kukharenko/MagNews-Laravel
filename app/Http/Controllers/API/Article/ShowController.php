<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ShowResource;
use App\Models\Article;

class  ShowController extends Controller
{
    public function __invoke(Article $article)
    {
        return new ShowResource($article);
    }
}
