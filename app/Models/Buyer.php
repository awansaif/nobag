<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Buyer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'surname',
        'dob',
        'email',
        'password',
        'email_verified_at'
    ];

    public function profile()
    {
        return $this->hasOne(BuyerProfile::class);
    }

    public function trips()
    {
        return $this->hasMany(BookTrip::class);
    }
}
