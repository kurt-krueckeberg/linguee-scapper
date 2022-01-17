#!/usr/bin/env php
<?php
include 'vendor/autoload.php';

use Einenlum\LingueeApi\Factory;
use \SplFileObject as File;

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
total 148
drwxrwxr-x  5 kurt kurt      4096 Jan 17 18:01 .
-rwxrw-r--  1 kurt kurt      3717 Jan 17 18:01 LingueeScrapper.php
-rw-r--r--  1 kurt kurt     20480 Jan 17 18:01 .LingueeScrapper.php.swp
-rw-rw-r--  1 kurt kurt     18907 Jan 17 17:50 new.html
-rw-rw-r--  1 kurt kurt      1342 Jan 17 17:49 template.html
-rw-rw-r--  1 kurt kurt       707 Jan 17 17:49 general-style.css
drwxrwxr-x  8 kurt kurt      4096 Jan 17 15:18 .git
-rw-rw-r--  1 kurt kurt      3000 Jan 17 15:18 xml.md
drwxrwxrwx 11 root www-data  4096 Jan 17 12:01 ..
-rw-rw-r--  1 kurt kurt       275 Jan 17 11:38 skeleton.html
-rw-rw-r--  1 kurt kurt      1152 Jan 16 13:47 x.php
-rw-rw-r--  1 kurt kurt       886 Jan 16 13:43 s.xml
-rw-r--r--  1 root root       894 Jan 16 10:11 linguee.xml
-rw-rw-r--  1 kurt kurt        43 Jan 13 18:23 .gitignore
drwxrwxr-x  3 kurt kurt      4096 Jan 13 18:23 nbproject
-rw-rw-r--  1 kurt kurt        45 Jan 13 15:22 words.txt
lrwxrwxrwx  1 kurt kurt        19 Jan 13 15:20 l.php -> LingueeScrapper.php
drwxrwxr-x  9 kurt kurt      4096 Jan 13 14:19 vendor
-rw-rw-r--  1 kurt kurt     40286 Jan 13 14:19 composer.lock
-rw-rw-r--  1 kurt kurt        68 Jan 13 14:19 composer.json
-rw-rw-r--  1 kurt kurt       873 Jan 12 17:48 readme.md
class LingueeScraper {

static private $skel = <<<EOS
<?xml version="1.0" encoding="UTF-8"?>
<results>
  <L2_language>German</L2_language>
  <L1_language>English</L1_language>
  <result>
  </result>
</results>
EOS;

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $linguee;

  private $xml;
  private $word;
  private $fname;

  private $cur_result;

  public function __construct(string $xml_name)
   {
     $this->fname = $sml_fname;	  
     $this->linguee = Factory::create(); 

     $this->xml = new SimpleXMLElement(self::$skel);
     $this->cur = 0;
  }

  public function __destruct()
  {
	$this->asXML($this->xml_name);
  }

  public function scrape(string $word)
  {
      $response = $this->linguee->translate($word, 'ger', 'eng');

      $resp = $response->toArray();

      $this->xml->results->addElement('result');

      $result = $this->xml->results->result[$this->cur++];
      
      $result->addChild( 'word', trim($resp['query']) ); 

      $resp['words']

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

