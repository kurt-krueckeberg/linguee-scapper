#!/usr/bin/env php
<?php
include 'vendor/autoload.php';

use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;

class LingueeScraper {

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $linguee;


  public function __construct()
  {
     $this->linguee = Factory::create(); 
  }

  public function scrape(string $word)
  {
      $response = $this->linguee->translate($word, 'ger', 'eng');

      $arr = $response->toArray();

      $word = trim($arr['query'], ",");

      echo $word . "\n";

      $x = $arr['words'];

      $trans_nd_exs = array();

      foreach($x as $y) {

	  $translation[] = $y['translations']['term'];

	  // TODO: The examples (and there can be more than one) are paired with the specific translation--on the line above.
	  foreach($y['translations']['examples'] as $example) {
              
	      // Extract 'from' -- the German example sentence -- and 'to' -- its English translation.
	      $example['from'];
	      $example['to'];
	  }
      }
  }

  public function scrape_words(array $words) // or \Ds\Vector
  { 
    foreach ($words as $word) {
      
       $this->scrape($word);
    }
  }
}


// main loop
//
if ($argc == 1) {
  echo "Enter: -f 'file name'\n";
  return;
}

 $file = new File($argv[2], "r");

 $scraper = new LingueeScraper();

 $words = array('vernachlässigen', 'verändern');

 foreach ($words as $word) {
   
    $scraper->scrape($word);
 }

