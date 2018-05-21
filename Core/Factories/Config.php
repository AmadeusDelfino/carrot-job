<?php

namespace CarrotCore\Factories;

use CarrotCore\Interfaces\IFactory;
use CarrotCore\Settings\Bag;

class Config implements IFactory
{
    /**
     * @param $params
     *
     * @return Bag
     */
    public function __invoke($params)
    {
        return Bag::instance();
    }
}
