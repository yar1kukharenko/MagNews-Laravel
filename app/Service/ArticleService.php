<?php

namespace App\Service;

use App\Events\ArticleCreated;
use App\Models\Article;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function store($data): void
    {
        try {
            DB::beginTransaction();
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $article = Article::firstOrCreate($data);
            event(new ArticleCreated($article->id));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $request, $article)
    {
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($article->image);
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $article->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $article;

    }
}
