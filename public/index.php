<?php

require_once '../vendor/Autoloader.php';

$person = new App\Person('Ben');
echo $person->greeting();

