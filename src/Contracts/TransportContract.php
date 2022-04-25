<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface TransportContract
{
    /**
     * @param ConfigurationContract $config
     */
    public function __construct(ConfigurationContract $config);

    /**
     * @return array
     */
    public function response(): array;
}