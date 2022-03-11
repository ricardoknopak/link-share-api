<?php
namespace App\Http\Controllers;

// use voku\helper\HtmlDomParser;
use App\Service\ScrapeHtmlService;

use Illuminate\Http\Request;

class ScrapeHtmlController extends Controller {
    
    public function parse(Request $request) {
        $parse = new ScrapeHtmlService($request->url);
        
        $title = $parse->getTitle();
        $description = $parse->getDescription();
        $image = $parse->getImage();

        return response()->json([
            'title' => $title,
            'description' => $description,
            'image' => $image
        ], 200);
    }
}
    
    // public function getTitle() {
    //     $titleOg = $this->dom->findOneOrFalse("[property='og:title']");
    //     if($titleOg)
    //         return response()->json(["title" => $titleOg->getAttribute('content')], 200);
    //     $title = $this->dom->findOneOrFalse("title");
    //     if ($title)
    //         return response()->json(["title" => $title->getAttribute('content')], 200);
    // }

    // public function getDescription() {
    //     $descriptionOg = $this->dom->findOneOrFalse("[og:description]");
    //     if($descriptionOg)
    //         return response()->json(["title" => $descriptionOg->getAttribute('content')], 200);
    // }
    
    // public function getSiteName() {
    //     return $this->dom->findOneOrFalse("[og:site_name]");
    // }

    // public function ggetImage() {
    //     return [
    //         "src"    => $this->html->findOneOrFalse("[og:image]") || false,
    //         "width"  => $this->html->findOneOrFalse("[og:image:width]") || false,
    //         "height" => $this->html->findOneOrFalse("[og:image:height]") || false
    //     ];
    // }
// }