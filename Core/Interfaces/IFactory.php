<?php

namespace CarrotCore\Interfaces;

interface IFactory
{
    public function __invoke($params);
}
