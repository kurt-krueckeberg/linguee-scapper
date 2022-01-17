[linguee-api](https://github.com/Einenlum/linguee-api)

Install:

```bash
$ composer require einenlum/linguee-api
```

Sample Code:

```php
<?php
use Einenlum\LingueeApi\Factory;

include 'vendor/autoload.php';

$linguee = Factory::create();

// Example: https://www.linguee.com/english-german/search?query=desert
$response = $linguee->translate('desert', 'eng', 'ger');

// $response is an instance of Einenlum\LingueeApi\Response\DTO\Response
echo $response->toJson();
```
