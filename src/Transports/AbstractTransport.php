<?php

namespace Kaswell\NbrbBankApi\Transports;

use Kaswell\NbrbBankApi\Contracts\ConfigurationContract as Config;
use Kaswell\NbrbBankApi\Contracts\TransportContract as Transport;

abstract class AbstractTransport implements Transport
{
    protected $requests = [
        'currencies',
        'currency',
        'rates',
        'rate'
    ];

    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $request_type
     * @param ...$request
     * @return array
     */
    abstract public function get(string $request_type, ...$request): array;
}