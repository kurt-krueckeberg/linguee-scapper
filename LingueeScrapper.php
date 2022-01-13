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

      $a = $response->toArray();

      $word = trim($a['query'], ",");

      echo "The word being translated is: " . $word . "\n";

      //TODO: What is $x? And whjat is $y below?

      $x = $a['words']; // $x has the translations and the examples associated with each of the individual translations.

      foreach($x as $y) { // $y has?

	  // The examples (and there can be more than one) are paired with the specific translation--on the line above.
	  foreach($y['translations'] as $trans) {
              
              echo "\ttranslation = " . $trans['term'] . "\n";

	      foreach($trans['examples'] as $example) {

		  echo "\t\tfrom: " . $example['from'] . "\n";
		  echo "\t\tto: " . $example['to'] . "\n";
	      }
	  }
      }
      echo "==================\n";
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

