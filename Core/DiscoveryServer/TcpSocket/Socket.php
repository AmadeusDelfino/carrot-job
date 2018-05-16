<?php

namespace CarrotCore\DiscoveryServer\TcpSocket;

use CarrotCore\Abstracts\Socketable;
use CarrotCore\Interfaces\ISocket;
use CarrotCore\Support\Instances;

class Socket extends Socketable implements ISocket
{
    protected function configure()
    {
        $this->host = Instances::config()->get('discovery-server.host');
        $this->port = Instances::config()->get('discovery-server.port');
    }
}
