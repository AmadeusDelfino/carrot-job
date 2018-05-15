<?php

namespace CarrotCore\Settings;


use CarrotCore\Abstracts\Singletonable;
use Dotenv\Dotenv as DotenvBase;

class DotEnv extends Singletonable
{
    /**
     * @var $envs DotenvBase
     */
    protected $envs;

    /**
     * @param $instance
     */
    protected function configure($instance)
    {
        $instance->envs = new DotenvBase(__DIR__ . '/../../', '.env');
        try{
            $instance->envs->load();
        } catch (\Exception $e) {
            
        }
    }
}
