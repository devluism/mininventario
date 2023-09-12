<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'delivery_name',
        'delivery_id',
        'amount',
        'receiver_name',
        'receiver_id',
        'type',
    ];
}
