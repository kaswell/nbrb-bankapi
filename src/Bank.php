<?php

namespace Kaswell\NbrbBankApi;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract as Transport;

class Bank
{
    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var Transport
     */
    protected Transport $transport;

    /**
     * @param Config $config
     * @param Transport $transport
     */
    public function __construct(Config $config = new Configuration, Transport $transport = new CurlTransport)
    {
        $this->config = $config;
        $this->transport = $transport;
    }


    public function getCurrencies()
    {
        $this->transport->send('currencies');

    }
}