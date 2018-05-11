<?php

namespace CarrotCore\Factories;

use CarrotCore\Interfaces\IFactory;
use CarrotCore\Settings\Bag;

class Config implements IFactory
{
    public function __invoke($params)
    {
        return new Bag();
    }
}