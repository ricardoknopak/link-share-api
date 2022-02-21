<?php

namespace App\Http\Controllers;

use App\Models\Tags;

class TagsController extends BaseController
{
    public function __construct()
    {
        $this->classe = Tags::class;
    }
}