<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email_Management extends Model
{
    protected $table = 'email_blogs';
    protected $fillable = [
        'subject',	
        'email',	
        	 
    ];
}
