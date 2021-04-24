<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerBlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_blog_id',
        'tag_title',
    ];
}
