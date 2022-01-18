#!/usr/bin/env php
<?php
use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;

include 'vendor/autoload.php';
/*
 * <?xml version="1.0" encoding="UTF-8"?>
<results>
  <L2_language>German</L2_language>
  <L1_language>English</L1_language>
  <result>
      <word>vernachlässigen</word>
      <translations>
        <translation>
		<definition>to neglect</definition>
           <examples>
             <example>
               <L2_sentence></L2_sentence>
               <L1_translation></L1_translation>
             </example> 
          </examples>
        </translation>
        <translation>
           <definition>to ignore</definition>
           <examples>
             <example>
               <L2_sentence></L2_sentence>
               <L1_translation></L1_translation>
             </example> 
          </examples>
        </translation>
      </translations>
  </result>
  </results>
*/

class LingueeScraper {

static private $skel = <<<EOS
<?xml version="1.0" encoding="UTF-8"?>
<results>
  <L2_language>German</L2_language>
  <L1_language>English</L1_language>
</results>
EOS;

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $linguee;

  private $xml;
  private $word;
  private $fname;

  public function __construct()
  {
     $this->linguee = Factory::create(); 

     $this->xml = new SimpleXMLElement(self::$skel);
  }

  public function __destruct()
  {
	$this->asXML($this->xml_name);
  }

  public function scrape(string $word)
  {
      $response = $this->linguee->translate($word, 'ger', 'eng');

      $resp = $response->toArray();

      $result = $this->xml->results[0]->addChild('result');
      var_dump($result);

      $result->addChild('word', trim($resp['query'])); 

      $translations = $result->addChild('translations');

      foreach($resp['words'] as $y) {  // $y is a translation with its associated sample sentences. There can be serveral translations, thus the loop.

          $translation  = $translations->addChild('translation');

	  // We loop over the invidual definitions and their associated examples in German (and the example's English Translation). There can be more than one Geraman example sentence  (and its English translation) per translation.
	  foreach($y['translations'] as $trans) {
		  
	      $translation->addChild('definition', $trans['term']);
	      $examples = $translation->addChild('examples');
	      continue;

	      foreach($trans['examples'] as $example) {

		  // TODO: Don't we need to determine if the example has non-empyt sentences?     
                  $example = $examples->addChild('example');
		  $example->addChild('L2_sentence', $example['from']);
		  $example->addChild('L1_sentence', $example['to']);
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

