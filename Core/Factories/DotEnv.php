<?php

namespace CarrotCore\Factories;


use CarrotCore\Interfaces\IFactory;
use CarrotCore\Settings\DotEnv as DotEnvClass;

class DotEnv implements IFactory
{
    public function __invoke($params)
    {
        return DotEnvClass::init();
    }
}