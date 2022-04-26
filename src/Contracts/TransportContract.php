<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface TransportContract
{
    /**
     * @param ConfigurationContract $config
     */
    public function __construct(ConfigurationContract $config);

    /**
     * @param string $path
     * @param ...$request_data
     * @return void
     */
    public function get(string $path, ...$request_data): void;

    /**
     * @return array
     */
    public function response(): array;
}