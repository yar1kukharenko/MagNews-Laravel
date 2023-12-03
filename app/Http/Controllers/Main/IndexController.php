<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['users_count'] = User::all()->count();
        $data['categories_count'] = Category::all()->count();
        $data['articles_count'] = Article::all()->count();
        return view('main.index', compact('data'));
    }
}
