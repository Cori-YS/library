<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'price',
        'qtd',
        'is_paid',
        'sale_date',
        'delivery_date',
        'delivery_address',
    ];
}
