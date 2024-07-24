<?php

namespace App\Models;

use PostSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $cast = [
        'source' => PostSource::class
    ];
}
