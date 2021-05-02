<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'title',
        'category_id',
        'body',
        'featured_image'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
    public function tags()
    {
        return $this->hasMany(ArticleTag::class);
    }
}
