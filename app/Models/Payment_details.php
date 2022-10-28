<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_details extends Model
{
    protected $table = 'payment_details';
    protected $fillable = [
        'order_id',	
        'amount',	
        'provider',	
        'status',
    ];
}
