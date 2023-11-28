<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use Filterable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'articles';
    protected $guarded = false;


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
    }
}
