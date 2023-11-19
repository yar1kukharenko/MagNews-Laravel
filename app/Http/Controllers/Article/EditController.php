<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\Category;

class EditController extends BaseController
{
    public function __invoke(Article $article, Category $category)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }
}
