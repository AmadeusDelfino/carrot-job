<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Process.php';
require __DIR__ . '/../Core/Core.php';

$process = new \CarrotDaemon\Process();
$core = \CarrotCore\Support\Instances::core();

$process->start($core);