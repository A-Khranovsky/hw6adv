<?php

declare(strict_types=1);

require_once '../vendor/Autoloader.php';

$person = new App\Person('Ben');
echo $person->greeting();
