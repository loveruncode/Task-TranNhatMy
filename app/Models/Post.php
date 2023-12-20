<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $table = 'posts';
    protected $fillable = [
        'title',
        'is_featured',
        'status',
        'image',
        'excerpt',
        'content',
        'post_at',
        'slug',
    ];
}
