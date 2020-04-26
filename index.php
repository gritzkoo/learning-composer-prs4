<?php

require_once __DIR__.'/vendor/autoload.php';

$t = new App\Services\LalaService();

echo $t->getDescription();

exit;
