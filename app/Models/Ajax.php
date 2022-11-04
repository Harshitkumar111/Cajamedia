<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajax extends Model
{
    protected $table = 'ajax';
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
    ];
}
