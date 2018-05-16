<?php

namespace CarrotDaemon;

use CarrotCore\Core;

class Process
{
    protected $core;

    public function start(Core $core)
    {
        $this->core = $core;
        $core->test();
    }
}