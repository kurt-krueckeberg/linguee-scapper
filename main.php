#!/usr/bin/env php
<?php
use Einenlum\LingueeApi\Factory;

use \SplFileObject as File;

include 'vendor/autoload.php';

include "LingueeScrapper.php";

// main loop
 $scraper = new LingueeScraper();
/*
$words = array(
 "treten",
 "behandeln",
 "legen",
 "liegen",
 "waschen",
 "wachsen",
 "pflanzen",
 "lassen",
 "heißen",
 "verheißen",
 "halten",
 "behalten",
 "gelingen",
 "gelten",
 "vergessen",
 "schlagen",
 "beitreten",
 "hinausschießen",
 "vernachlässigen",
 "verwüsten");
 */

$words = array("treten");

 foreach ($words as $word) {

    sleep(5);

    $scraper->scrape($word);
 }

 $scrapper->print();

