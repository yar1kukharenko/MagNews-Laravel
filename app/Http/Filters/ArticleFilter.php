<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends AbstractFilter
{

    const CATEGORIES = 'categories';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
        ];
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }
}
