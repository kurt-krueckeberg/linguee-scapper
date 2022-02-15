<?php
use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;

include 'vendor/autoload.php';

/*
<?xml version="1.0" encoding="UTF-8"?>
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

  private $linguee;

  private $xml;
  private $index;

  public function __construct()
  {
     $this->linguee = Factory::create(); 

     $this->xml = new SimpleXMLElement(self::$skel);
     $this->index = 0;
  }

  function scrape(string $word)
  {
      $response = $this->linguee->translate($word, 'ger', 'eng');
   
      $resp = $response->toArray();
   
      $result = $this->xml->addChild('result'); 
      
      $result->addChild('word', trim($resp['query']));
   
      $translations = $result->addChild('translations');
   
      foreach($resp['words'] as $y) {  // $y is a translation with its associated sample sentences. There can be serveral translations, thus the loop.
      
          $tran = $translations->addChild('translation');
      
          // We loop over the invidual definitions and their associated examples in German (and the example's English Translation). There can be more than one Geraman example sentence  (and its English translation) per translation.
          foreach($y['translations'] as $t) {
  	        
              $tran->addChild('definition', $t['term']);
      
              $examples = $tran->addChild('examples');
      
              foreach($t['examples'] as $e_) {
      
                  $ex = $examples->addChild('example');
      
  	        $ex->addChild('L2_sentence', $e_['from']);
  	        $ex->addChild('L1_sentence', $e_['to']);
              }
          }
      }
  }
  function print()
  {
     echo $this->xml;
  }
}

/*
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

    sleep(4);

    $scraper->scrape($word);
 }

 */
