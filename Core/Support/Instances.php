<?php

namespace CarrotCore\Support;

use CarrotCore\Core;
use CarrotCore\Factories\Bus;
use CarrotCore\Settings\Bag;
use CarrotCore\Settings\DotEnv;

class Instances
{
    /**
     * @return Bus
     */
    public static function bus() : Bus
    {
        return Bus::instance();
    }

    /**
     * Get the Core Singleton class.
     *
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     *
     * @return Core
     */
    public static function core() : Core
    {
        return self::bus()->make('application_core');
    }

    /**
     * Get the Config Bag Singleton class.
     *
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     *
     * @return Bag
     */
    public static function config() : Bag
    {
        return self::bus()->make('config');
    }

    /**
     * Get the DotEnv Singleton class.
     *
     * @throws \CarrotCore\Exceptions\FactoryNotFoundException
     *
     * @return DotEnv
     */
    public static function dotEnv() : DotEnv
    {
        return self::bus()->make('dotenv');
    }
}
