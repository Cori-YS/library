<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'publisher_id',
        'area_id',
        'price',
        'cover',
        'sinopse',
        'stock',
        'publishing_date',
    ];
}
