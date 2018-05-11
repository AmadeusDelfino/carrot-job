<?php

namespace CarrotCore;

use CarrotCore\Factories\Bus;

class Core
{
    protected $settings;
    protected $dotEnv;

    public function __construct()
    {
        $this->warmup();
    }

    public function getSettings()
    {
        return $this->settings;
    }

    private function warmup()
    {
        $this->settings = Bus::make('config');
        $this->dotEnv = Bus::make('dotEnv');
    }
}
