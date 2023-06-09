<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $guard = 'seller';

    protected $fillable = [
        'name',
        'email',
        'password',
        'credits',
        'status',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
