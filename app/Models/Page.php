<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages_management';
    protected $fillable = [
        'Title',	
        'Description',	
        'Meta_title',	
        'Meta_Description',
        'Meta_Keyword',
    ];
}
