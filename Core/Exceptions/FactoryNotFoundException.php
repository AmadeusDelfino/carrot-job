<?php

namespace CarrotCore\Exceptions;

class FactoryNotFoundException extends \Exception
{
    protected $message = 'Factory not found in bus';
}
