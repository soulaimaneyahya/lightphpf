#!/usr/bin/env php

<?php

/**
 * Author: Soulaimane Yahya
 * Date: 2023-03-14
 */

use App\Console\Commands\ClearCacheCommand;

require_once __DIR__ . '/../vendor/autoload.php';

$clearCacheCommand = new ClearCacheCommand();
$clearCacheCommand->run();
