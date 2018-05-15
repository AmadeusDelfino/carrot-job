<?php

namespace CarrotCore\Factories;


use CarrotCore\Abstracts\Singletonable;
use CarrotCore\Exceptions\FactoryNotFoundException;
use CarrotCore\Interfaces\IFactory;
use CarrotCore\Support\Instances;

class Bus extends Singletonable
{
    private $factories = [
        'config' => Config::class,
        'dotenv' => DotEnv::class,
        'application_core' => Core::class,
    ];
    /**
     * Get a concrete class from a class constructor
     * @param string $need
     * @param array $params
     * @return IFactory
     * @throws FactoryNotFoundException
     */
    public function make($need, $params = [])
    {
        $this->validate($need);
        $class = $this->factories[$need];

        return (new $class)($params);
    }

    /**
     * List of all registered factories on the bus
     * @return array
     */
    public function available()
    {
        return array_keys($this->factories);
    }

    /**
     * @param $need
     * @throws FactoryNotFoundException
     */
    protected function validate($need) : void
    {
        if(! (isset($this->factories[$need]))) {
            throw new FactoryNotFoundException();
        }
    }

    /**
     * @param $instance
     * @return mixed|void
     * @throws FactoryNotFoundException
     */
    protected function configure($instance)
    {
        $this->parseCustomFactories();
    }

    /**
     * @throws FactoryNotFoundException
     */
    private function parseCustomFactories()
    {
        $this->factories = array_merge($this->factories, Instances::config()->get('app.factories', []));
    }
}
