<?php

namespace CarrotCore\Settings;

use CarrotCore\Abstracts\Singletonable;

class Bag extends Singletonable
{
    protected $repository;

    protected function configure($instance)
    {
        $instance->repository = new Repository();
    }

    /**
     * Get a property described in your configuration files
     * @param $value
     * @return mixed
     */
    public function get($value)
    {
        return $this->repository->get($value);
    }
}