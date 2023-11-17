<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            Storage::disk('public')->delete($article->image);

            // Сохраняем новое изображение
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
//        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        $article->update($data);
        return (view('article.show', compact('article')));
    }
}
