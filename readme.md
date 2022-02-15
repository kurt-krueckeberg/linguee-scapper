# HOWTO

## Install Linguee API

Dependency: [linguee-api](https://github.com/Einenlum/linguee-api)

```bash
$ composer require einenlum/linguee-api
```

## Linguee API Overview

```php
<?php
use Einenlum\LingueeApi\Factory;

include 'vendor/autoload.php';

$linguee = Factory::create();

// Example: https://www.linguee.com/english-german/search?query=desert
$response = $linguee->translate('desert', 'eng', 'ger');

sleep(4); // Ensures Linguee.com will not block you for several hours

// $response is an instance of Einenlum\LingueeApi\Response\DTO\Response
echo $response->toJson();
```

## `LingueeScrapper` wraps Linugee API

    `sleep(4)` ensures Linguee.com does not lock us out for several hours.

```php
//
 $scraper = new LingueeScraper();

 $words = array('vernachlässigen', 'verändern');

 foreach ($words as $word) {

    sleep(4); // Ensures Linguee.com does not lock us out for several hours.

    $scraper->scrape($word);
 }
```

## XML Output

``` xml
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
```


