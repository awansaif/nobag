<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'personal_photo',
        'slogan',
        'self_description',
        'spoken_language',
        'qualifiaction',
        'personal_video',
    ];
}
