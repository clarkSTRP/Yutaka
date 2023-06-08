<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'price',
        'street',
        'image',
        'name',
        'author',
        'adress',
        'content',
        'user_id',
        'cities_id',
    ];
}
