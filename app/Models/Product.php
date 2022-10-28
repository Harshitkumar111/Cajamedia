<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name',
        'SKU',
        'price',
        'desc',
        'category_id',
        'inventoey_id',
        'discount_id',
    ];
}
