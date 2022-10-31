<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'seo_management';
    protected $fillable = [
        'Analytics ',
        'Header_Code',
        'Footer_Code',      
    ];
}
