# SimpleXML

Edit this with Gedit

TODO:
- Look into SimpleXML and DOMDocument interoperability. Maybe we can insert the XML node value/text using a DOMDocument call?
- Read you on SimpleXML and DOM in general at w3schools.com
- Good [code examples](https://way2tutorial.com/xml/php-generate-xml.php)


## simmple_xml Usage

[PHP SimpleXML Parser](https://www.w3schools.com/Php/php_xml_simplexml_read.asp)


## simple_xml::addElement()

`simple_xml::addElement()` self-documenting example


```php
<?php

include 'example.php';

$sxe = new SimpleXMLElement($xmlstr);
$sxe->addAttribute('type', 'documentary');

$movie = $sxe->addChild('movie');
$movie->addChild('title', 'PHP2: More Parser Stories');
$movie->addChild('plot', 'This is all about the people who make it work.');

$characters = $movie->addChild('characters');
$character  = $characters->addChild('character');
$character->addChild('name', 'Mr. Parser');
$character->addChild('actor', 'John Doe');

$rating = $movie->addChild('rating', '5');
$rating->addAttribute('type', 'stars');
 
echo $sxe->asXML();

?>
```

The above example will output something similar to:

```xml
<?xml version="1.0" standalone="yes"?>
<movies type="documentary">
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#xD3;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
 <movie>
  <title>PHP2: More Parser Stories</title>
  <plot>This is all about the people who make it work.</plot>
  <characters>
   <character>
    <name>Mr. Parser</name>
    <actor>John Doe</actor>
   </character>
  </characters>
  <rating type="stars">5</rating>
 </movie>
</movies>
```


## SimpleXMLElement::xpath

XPath SimpleXML query

```php

<?php
$string = <<<XML
<a>
 <b>
  <c>text</c>
  <c>stuff</c>
 </b>
 <d>
  <c>code</c>
 </d>
</a>
XML;

$xml = new SimpleXMLElement($string);

/* Search for <a><b><c> */
$result = $xml->xpath('/a/b/c');

while(list( , $node) = each($result)) {
    echo '/a/b/c: ',$node,"\n";
}

/* Relative paths also work... */
$result = $xml->xpath('b/c');

while(list( , $node) = each($result)) {
    echo 'b/c: ',$node,"\n";
}
?>
```
