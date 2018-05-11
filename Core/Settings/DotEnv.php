<?php

namespace CarrotCore\Settings;


class DotEnv
{
    protected $envs;

    public static function init() : DotEnv
    {
        $self = new self;
        $paths = new Paths();
        $self->envs = new \Dotenv\Dotenv($paths->dotenv, '.env');

        return $self;
    }
}