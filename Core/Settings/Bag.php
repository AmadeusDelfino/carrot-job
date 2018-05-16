<?php

namespace CarrotCore\Settings;

use CarrotCore\Abstracts\Singletonable;

class Bag extends Singletonable
{
    /** @var Repository */
    protected $repository;

    /**
     * Get a property described in your configuration files.
     *
     * @param $value
     *
     * @return mixed
     */
    public function get($value)
    {
        return $this->repository->get($value);
    }

    /**
     * Defines a property overwriting the configuration file or creating a new entry.
     *
     * @param $key
     * @param $value
     *
     * @return Bag
     */
    public function set($key, $value)
    {
        $this->repository->set($key, $value);

        return $this;
    }

    /**
     * Get all settings loaded.
     *
     * @return array
     */
    public function all()
    {
        return $this->repository->all();
    }

    protected function configure($instance)
    {
        $instance->repository = new Repository();
    }
}
