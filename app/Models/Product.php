<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        "price",
        "unit",
        'img',
        'stoke'
    ];

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class);
    }

}
