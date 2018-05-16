<?php

namespace CarrotCore\Abstracts;

use CarrotCore\Exceptions\CallbackFunctionInvalidException;
use CarrotCore\Interfaces\ISocket;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use React\Socket\Server;

abstract class Socketable implements ISocket
{
    protected $host;
    protected $port;
    protected $listeners = [];
    /** @var Server */
    protected $socket;
    /** @var LoopInterface */
    protected $loop;

    public function __construct()
    {
        $this->configure();
    }

    /**
     * Configure the socket and register the previously supplied callback functions.
     */
    public function init()
    {
        $this->loop = $this->createLoop();
        $this->socket = $this->createSocket($this->loop);
        $this->registerListeners();

        return $this;
    }

    /**
     * Starts listening on the socket.
     */
    public function run(): void
    {
        $this->loop->run();
    }

    /**
     * Adds a callback function to an event on the connection.
     *
     * @param string $event
     * @param $callback
     *
     * @throws CallbackFunctionInvalidException
     *
     * @return $this
     */
    public function addListener($event, $callback): self
    {
        if (is_callable($callback)) {
            $this->listeners[$event] = $callback;

            return $this;
        }

        throw new CallbackFunctionInvalidException();
    }

    /**
     * Removes a previously defined callback function.
     *
     * @param string $event
     *
     * @return $this
     */
    public function removeListener($event): self
    {
        unset($this->listeners[$event]);

        return $this;
    }

    abstract protected function configure();

    private function createLoop()
    {
        return Factory::create();
    }

    private function createSocket($loop)
    {
        return new Server($this->makeUrlServerSring(), $loop);
    }

    private function makeUrlServerSring()
    {
        return $this->host.':'.$this->port;
    }

    private function registerListeners()
    {
        foreach ($this->listeners as $event => $callback) {
            $this->socket->on($event, $callback);
        }
    }
}
