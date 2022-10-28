<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contact';
    protected $fillable = [
        'first_name',	
        'last_name',	
        'email',	
        'phone_number',
        'address',
    ];
}
