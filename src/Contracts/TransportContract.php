<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface TransportContract
{
    /**
     * @param ConfigurationContract $config
     */
    public function __construct(ConfigurationContract $config);

    /**
     * @param string $request_type
     * @param ...$request
     * @return array
     */
    public function get(string $request_type, ...$request): array;
}