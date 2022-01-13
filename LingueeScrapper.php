<?php
include 'vendor/autoload.php';

use Einenlum\LingueeApi\Factory;

class LingeeScraper {

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $linguee;


  public function __construct()
  {
     $this->linguee = Factory::create(); 
  }

  public function scrape_word(string $word)
  {
      $response = $linguee->translate($word, 'ger', 'eng');

      $query = trim($subarray['query'], ",");

      // Process rest of subarray 

  }

  public function scrape_words(array $words) // or \Ds\Vector
  { 

  }
}




// main loop
//
   $scraper = new LingueeScraper();

   foreach ($words as $word) {
   
	   $scrapper->scrape($word);
   }

