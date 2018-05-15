<?php


namespace CarrotCore\Factories;


use CarrotCore\Interfaces\IFactory;

class Core implements IFactory
{

    public function __invoke($params)
    {
        return \CarrotCore\Core::instance();
    }
}