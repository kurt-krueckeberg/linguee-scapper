<?php
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

$skel = <<<EOS
<?xml version="1.0" encoding="UTF-8"?>
<results>
  <L2_language>German</L2_language>
  <L1_language>English</L1_language>
</results>
EOS;
 
function test($xml, $word)
{
   $result = $xml->addChild('result'); //Note: $this->xml->results[0]
   
   $result->addChild('word', $word); 

   $translations = $result->addChild('translations');

   $tran = $translations->addChild('translation');

   $tran->addChild('definition', $word);

   $examples = $tran->addChild('examples');

   $ex = $examples->addChild('example');

   $ex->addChild('L2_sentence', "Hallo mein Freund");
   $ex->addChild('L1_sentence', "Hello my friend");

   $ex = $examples->addChild('example');

   $ex->addChild('L2_sentence', "Guten Abend Gisela");
   $ex->addChild('L1_sentence', "Good evening Gisela");
}

/* function test($xml, $name)
{
  static $i = 0; 

  //$xml->result[$i]->addAttribute('id', 1);

  $xml->addChild('result');

  $xml->result[$i]->addChild('name', $name);
  $xml->result[$i]->addChild('sgpa', '8.1');
  $xml->result[$i]->addChild('cgpa', '8.4');
  ++$i;
}
*/
/*
function test2($xml, $name)
{

  //$xml->result[$i]->addAttribute('id', 1);

  $xml->addChild('result');

  $xml->result[0]->addChild('name', $name);
  $xml->result[0]->addChild('sgpa', '8.1');
  $xml->result[0]->addChild('cgpa', '8.4');
}
 */
  $xml = new SimpleXMLElement($skel);

  test($xml, "Hallo");
  test($xml, "Abend");

  echo $xml->asXML('exp.xml');
?>
