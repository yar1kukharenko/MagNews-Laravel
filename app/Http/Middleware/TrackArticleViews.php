<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class TrackArticleViews
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('get') && $request->route()->named('articleApi.show')) {
            $article = $request->route('article');

            if ($article instanceof Article) {
                $article->increment('views_count');
            }
        }

        return $response;
    }
}
