<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'password',
        'visible_password',
        'first_name',
        'surname',
        'pob',
        'dob',
        'nationality',
        'phone',
        'email',
        'fiscal_code',
        'vat_number',
        'registration_number',
        'iban',
        'is_verified'
    ];

    public function profile()
    {
        return $this->hasOne(SellerProfile::class);
    }
}
