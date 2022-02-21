<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use Illuminate\Http\Request;

class BookmarksController extends BaseController
{
    public function __construct()
    {
        $this->classe = Bookmarks::class;
    }
}