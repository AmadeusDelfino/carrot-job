<?php

namespace CarrotCore\Factories;


use CarrotCore\Exceptions\FactoryNotFoundException;
use CarrotCore\Interfaces\IFactory;

class Bus
{
    protected static $factories = [
        'config' => Config::class,
        'path' => Path::class,
        'dotEnv' => DotEnv::class,
    ];

    /**
     * @param $need
     * @param array $params
     * @return IFactory
     * @throws FactoryNotFoundException
     */
    public static function make($need, $params = [])
    {
        self::validate($need);
        $factory = new self::$factories[$need];
        return $factory($params);
    }

    /**
     * @param $need
     * @throws FactoryNotFoundException
     */
    protected static function validate($need) : void
    {
        if(! (isset(self::$factories[$need]))) {
            throw new FactoryNotFoundException();
        }
    }
}
