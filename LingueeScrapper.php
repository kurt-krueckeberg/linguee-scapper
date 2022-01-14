#!/usr/bin/env php
<?php
include 'vendor/autoload.php';

use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;
use \Ds\Vector as vector;

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

      $german_word = trim($a['query'], ",");

      echo "The word being translated is: " . $german_word . "\n";


      $x = $a['words']; // $x has the translations and their assocaiated examples.

      foreach($x as $y) { 

	  // We loop over the invidual definitions and their associated examples in German (and the example's English Translation). There can be more than one Geraman example sentence  (and its English translation) per translation.
	  foreach($y['translations'] as $trans) {
              
              // TODO: Decide how we want to pair the elements
              /*
               Idea: 
               Use \Ds\Hashtable\ that contains vectors
              The German word has one or translations. Each translation for the German word has one or more German example sentences and their English translations. 
               $output['vernachlässigen'] => { {translation1 {Associated Example1, Example2, ...}, {translation2 {Associated Example1, Example2, ...}, ...{translationn {Associated Example1, Example2, ...} };
               * 
               * 
               */
                      
	      $word->addChild( $dom->createElement('definition', $trans['term']);

	      foreach($trans['examples'] as $example) {

                   $word->appendChild( $dom->createElement('examples');
		  add$germ_example = $example['from'];
		  $its_translation = $example['to'];
	      }
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

