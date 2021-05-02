<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'trip_id',
        'seller_id',
        'price',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
