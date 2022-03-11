<?php

namespace App\Service;

use voku\helper\HtmlDomParser;

class ScrapeHtmlService {

    protected $html;

    public function __construct($url = null) {
        if(is_null($url)) return false;

        $this->html = HtmlDomParser::file_get_html($url);
        
        if(!$this->html) return false;
    }

    public function getTitle() {
        $titleOg = $this->html->findOneOrFalse("[property='og:title']");
        if($titleOg) {
            return response()->json(["title" => $titleOg->getAttribute('content')], 200);
        }

        $title = $this->html->findOneOrFalse("title");
        if ($title) {
            return response()->json(["title" => $title->getAttribute('content')], 200);
        }
        return false;
    }

    public function getDescription() {
        $descriptionOg = $this->html->findOneOrFalse("[property='og:description']");
        if($descriptionOg) {
            return response()->json(["title" => $descriptionOg->getAttribute('content')], 200);
        }
        return false;
    }
    
    public function getImage() {
        return [
            "src"    => $this->html->findOneOrFalse("[property='og:image']"),
            "width"  => $this->html->findOneOrFalse("[property='og:image:width']"),
            "height" => $this->html->findOneOrFalse("[property='og:image:height']")
        ];
    }
}