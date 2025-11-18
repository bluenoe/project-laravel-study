<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // tên bảng trong MySQL

    protected $fillable = [
        'name',
        'slug',
        'price',
        'image',
        'description',
        'promotion_price',
        'unit',
        'new'
    ];
}
