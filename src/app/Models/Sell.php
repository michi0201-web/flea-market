<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'category',
        'situation',
        'name',
        'brand',
        'description',
        'price',
    ];
}
