# SimpleXML

XML Guides:
- W3Schools [XML Tutorial](https://www.w3schools.com/xml/default.asp)

- W3Schools [XML DOM Tutorial](https://www.w3schools.com/xml/dom_intro.asp)

- W3Schools general [XPath Tutorial](https://www.w3schools.com/xml/xpath_intro.asp)

- W3Schools general [PHP XML Tutorial](https://www.w3schools.com/php/php_xml_parsers.asp)

- [SimpleXML Basic USage](https://www.php.net/manual/en/simplexml.examples-basic.php)
  **Example #11** shows
  > PHP has a mechanism to convert XML nodes between SimpleXML and DOM formats. This example shows how one might change a DOM element to SimpleXML. 

- [Code examples](https://way2tutorial.com/xml/php-generate-xml.php) of creating XML using SimpleXML and DOMDocument.

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
