<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
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
        return $this->hasMany(SellerBlogTag::class);
    }
}
