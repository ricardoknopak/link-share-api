<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    protected $fillable = [
        'title', 'url', 'description', 'image_source'
    ];
}