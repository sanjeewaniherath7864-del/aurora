<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

    protected $fillable = [
        'user_id',
        'customer_name',
        'bank_card_no',
        'mobile_no',
        'status',
        'place_at',
        'vehicle_no',
        'distace_traveled',
        'address',
        'price',
        'issued_at',
        'shipped_at'


    ];


}
