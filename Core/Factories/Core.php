<?php

namespace CarrotCore\Factories;

use CarrotCore\Core as CoreClass;
use CarrotCore\Interfaces\IFactory;

class Core implements IFactory
{
    public function __invoke($params)
    {
        return CoreClass::instance();
    }
}
