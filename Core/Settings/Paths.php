<?php

namespace CarrotCore\Settings;


class Paths
{
    protected $paths = [];

    public function __construct()
    {
        $basePath = __DIR__ . '/../../';
        $this->paths = [
            'configs' => $basePath . 'configs/',
            'dotenv' => $basePath . '.env',
        ];
    }

    public function __get($name)
    {
        return $this->paths[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->paths[$name] = $value;

        return $this;
    }
}