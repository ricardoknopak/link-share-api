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
            return $titleOg->getAttribute('content');
        }

        $title = $this->html->findOneOrFalse("title");
        if($title) {
            return $title->getAttribute('content');
        }
        return false;
    }

    public function getDescription() {
        $descriptionOg = $this->html->findOneOrFalse("[property='og:description']");
        if(!$descriptionOg) {
            return false;
        }
        return $descriptionOg->getAttribute('content');
    }
    
    public function getImage() {
        $imageOg = $this->html->findOneOrFalse("[property='og:image']");
        if(!$imageOg) {
            return false;
        }
        return $imageOg->getAttribute('content');
    }

    public function parse() {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'image_source' => $this->getImage()
        ];
    }
}