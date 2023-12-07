<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Models\Category;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        $result = [
            'data' => $categories
        ];

        return response()->json($result);
    }
}
