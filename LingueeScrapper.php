<?php
include 'vendor/autoload.php';

use Goutte\Client;

class LingeeScraper {

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $client;


  public function __construct()
  {
     $this->client = new Client();

  }

  public function scrape_word(string $word)
  {

  }

  public function scrape_words(array $words) // or \Ds\Vector
  {

  }


}

function translate(string $word)
{
	
  $response = $linguee->translate($word, 'ger', 'eng');

 // $response is an instance of Einenlum\LingueeApi\Response\DTO\Response
  // $arr = $response->toArray();
  $arr = $response->toArray();

  foreach($arr as $subarr) {
    
      $query = trim($subarray['query'], ",");

      // Process rest of subarray 
  }	  
}


// main loop

foreach ($words as $word) {

	translate($word);
}

