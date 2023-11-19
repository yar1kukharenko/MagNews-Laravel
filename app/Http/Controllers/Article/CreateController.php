<?php

namespace App\Http\Controllers\Article;

use App\Models\Category;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }
}
