<?php

namespace CarrotCore;


use CarrotCore\Abstracts\Singletonable;
use CarrotCore\Support\Instances;

class Core extends Singletonable
{
    /**
     * @param $instance
     * @throws Exceptions\FactoryNotFoundException
     */
    protected function configure($instance)
    {
        $this->warmup();
    }

    /**
     * Required to load .env
     * @throws Exceptions\FactoryNotFoundException
     */
    private function warmup()
    {
        Instances::dotEnv();
    }
}
