<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'event_title',
        'place',
        'description',
        'short_description',
        'date',
        'time',
        'frequency',
        'tongue',
        'cost',
        'video_trailer',
        'photos',
        'google_map',
        'max_seats',
        'min_seats',
        'available_places',
        'closing_date_of_the_sale',
        'digital_guide',
        'virtual_connection_link',
    ];

    public function tags()
    {
        return $this->hasMany(TripTag::class);
    }

    public function guide()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
}
