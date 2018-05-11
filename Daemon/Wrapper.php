<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Process.php';
require __DIR__ . '/../Core/Core.php';

$process = new \CarrotDaemon\Process();
$core = new \CarrotCore\Core();

$process->start($core);