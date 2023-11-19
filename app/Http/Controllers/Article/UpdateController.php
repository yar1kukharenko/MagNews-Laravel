<?php

namespace App\Http\Controllers\Article;

use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        $article = $this->service->update($data, $request, $article);

        return (view('article.show', compact('article')));
    }
}
