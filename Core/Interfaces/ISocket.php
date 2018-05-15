<?php

namespace CarrotCore\Interfaces;


interface ISocket
{
    public function init();
    public function run();
    public function addListener($event, $callback);
    public function removeListener($event);
}
