<?php

namespace CarrotCore\Support;


use CarrotCore\Core;
use CarrotCore\Factories\Bus;
use CarrotCore\Settings\Bag;
use CarrotCore\Settings\DotEnv;

class Instances
{
    /**
     * Get the Core Singleton class
     * @return Core
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     */
    public static function core()
    {
        return Bus::make('application_core');
    }

    /**
     * Get the Config Bag Singleton class
     * @return Bag
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     */
    public static function config()
    {
        return Bus::make('config');
    }

    /**
     * Get the DotEnv Singleton class
     * @return DotEnv
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     */
    public static function dotEnv()
    {
        return Bus::make('dotenv');
    }
}