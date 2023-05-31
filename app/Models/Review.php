<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'comment',
        'rating_number',
        'product_id',
        'client_id',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id');
    }

    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id');
    }
}
