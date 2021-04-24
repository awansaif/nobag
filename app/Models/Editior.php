<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editior extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'visible_password',
        'first_name',
        'surname',
        'phone',
        'email'
    ];
}
