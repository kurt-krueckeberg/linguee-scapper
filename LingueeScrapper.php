#!/usr/bin/env php
<?php
include 'vendor/autoload.php';

use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;
use \Ds\Vector as vector;

class LingueeScraper {

static private $skel = <<<EOS
<?xml version="1.0" encoding="UTF-8"?>
<results>
  <L2_language>German</L2_language>
  <L1_language>English</L1_language>
   <result>
      <word></word>
      <translations>
         <translation>
           <definition></defintion>
           <examples>
             <example>
               <L2_sentence></L2_sentence>
               <L1_translation></L1_translation>
             </example> 
          </examples>
        </translation>
      </translations>
   </result>
<results>
EOS;


  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $linguee;
  private $dom;
  private $root;

  public function __construct()
  {
     $this->linguee = Factory::create(); 

     $dom = new DOMDocument('1.0','UTF-8'); // TODO: USe XML and then query it?
     $this->dom= DOMDocument::loadXML(self::$skel);
     $dom->formatOutput = true;
   
     $root = $dom->createElement('dict_entries');
     $dom->appendChild($root);
  }

  public function __destruct()
  {
	$this->dom->saveXML();
  }

  public function scrape(string $word)
  {
      $response = $this->linguee->translate($word, 'ger', 'eng');

      $a = $response->toArray();

      $dict_entry = $this->dom->createElement('dict_entry');
      $this->root->addElement($dict_entry);

      $this->root->createElement('word', trim($a['query'])); // $german_word = trim($a['query'], ",");
      $dict_entry->addElement($dict_entry);

      $x = $a['words']; // $x has the translations and their assocaiated examples.

      foreach($x as $y) { 

          $transs = $this->dom->createElement('translations');

          $dict_entry->addElement($transs);

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
              $trans = $this->dom->createElement('translation', $trans['term']);
	      $transs->addChild($trans);

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

