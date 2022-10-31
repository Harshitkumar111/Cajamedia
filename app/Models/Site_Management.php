<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site_Management extends Model
{
    protected $table = 'site_management';
    protected $fillable = [
        'Site_name',
        'Phone_number',
        'Email_address', 
        'Address',
        'About_us_info', 
        'Copyright',    
    ];
}
