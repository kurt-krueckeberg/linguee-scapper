<?php

$skel = <<<EOS
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
               <L2_sentence>Wenn er viel Arbeit hat, vernachlässigt er sein Privatleben.</L2_sentence>
               <L1_translation>When busy at work, he neglects his private life.</L1_translation>
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
EOS;

   //--$xml = simplexml_load_file("./s.xml");
   $xml = new SimpleXMLElement($skel);
   echo $xml->asXML();   
   return;

   $xml->results->result->word = "Zucker"; // $this->xml->xpath('/results/result/word');
   echo $xml->asXML();   
