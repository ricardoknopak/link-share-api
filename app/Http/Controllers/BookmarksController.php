<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use App\Service\ScrapeHtmlService;
use Illuminate\Http\Request;

class BookmarksController extends BaseController
{
    public function __construct()
    {
        $this->classe = Bookmarks::class;
    }

    public function store(Request $request)
    {
        $parse = new ScrapeHtmlService($request->url);
        $response = $parse->parse();
        
        $bookmark = [
            "title" => $response['title'],
            "url" => $request->url,
            "description" => $response['description'],
            "image_source" => $response['image_source'],
        ];

        return response()->json(
            $this->classe::create($bookmark), 201
        );
    }
}
