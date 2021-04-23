<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'nickename',
        'personal_photo',
        'tongue',
        'passions',
        'short_description',
        'fiscal_code',
    ];
}
