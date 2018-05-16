<?php

namespace CarrotCore;

use CarrotCore\Abstracts\Singletonable;
use CarrotCore\DiscoveryServer\TcpSocket\Socket;
use CarrotCore\Support\Instances;

class Core extends Singletonable
{
    public function test()
    {
        $socket = new Socket();
        $socket
            ->init()
            ->run();
    }

    /**
     * @param $instance
     *
     * @throws Exceptions\FactoryNotFoundException
     */
    protected function configure($instance)
    {
        $this->warmup();
    }

    /**
     * Required to load .env.
     *
     * @throws Exceptions\FactoryNotFoundException
     */
    private function warmup()
    {
        Instances::dotEnv();
    }
}
