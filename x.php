<?php
use Einenlum\LingueeApi\Factory;

include 'vendor/autoload.php';

$linguee = Factory::create();

// Example: https://www.linguee.com/english-german/search?query=desert
$response = $linguee->translate('desert', 'eng', 'ger');

// $response is an instance of Einenlum\LingueeApi\Response\DTO\Response
print_r($response->toArray());
