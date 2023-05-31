<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'client';

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'birthdate',
        'state',
        'city',
        'credits',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
