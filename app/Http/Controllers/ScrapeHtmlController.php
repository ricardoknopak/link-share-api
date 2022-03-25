<?php
namespace App\Http\Controllers;

// use voku\helper\HtmlDomParser;
use App\Service\ScrapeHtmlService;

use Illuminate\Http\Request;

class ScrapeHtmlController extends Controller {
    
    public function parse(Request $request) {
        $parse = new ScrapeHtmlService($request->url);
         return response()->json($parse->parse());
    }
}