<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'user_id',	
        'total',	
        'payment_id',	 
    ];
}
