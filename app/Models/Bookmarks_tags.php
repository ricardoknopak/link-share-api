<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmarks_tags extends Model
{
    protected $fillable = [
        'bookmark_id', 'tags'
    ];
}