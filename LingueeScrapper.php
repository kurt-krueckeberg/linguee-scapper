<?php
include 'vendor/autoload.php';

use Goutte\Client;

class LingeeScraper {

  private static $url = 'https://www.linguee.de/deutsch-englisch/search?source=auto&query=';
  private $client;


  public function __construct()
  {
     $this->client = new Client();

  }

  public function scrape_word(string $word)
  {

  }

  public function scrape_words(array $words) // or \Ds\Vector
  {

  }


}
