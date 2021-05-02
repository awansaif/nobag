<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTrip extends Model
{
    use HasFactory;

    protected $filable = [
        'buyer_id',
        'trip_id',
        'seller_id',
        'price',
    ];
}
