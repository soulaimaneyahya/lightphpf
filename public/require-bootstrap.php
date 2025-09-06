<?php

declare(strict_types=1);

use App\Bootstrap\Bootstrap;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../config/app.php';
$twig = require_once __DIR__ . '/../config/twig.php';

return (new Bootstrap(
    $config,
    $twig
));
