<?php

namespace App\Http\Controllers\API\Article\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Category\Comment\StoreRequest;
use App\Models\Article;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(Article $article, StoreRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
    }
}
