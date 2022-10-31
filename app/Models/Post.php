<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post_management';
    protected $fillable = [
        'Title',	
        'Description',
        'Meta_title',	
        'Meta_Description',
        'Meta_Keyword',
    ];
}
