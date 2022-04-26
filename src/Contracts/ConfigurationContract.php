<?php

namespace Kaswell\NbrbBankApi\Contracts;

interface ConfigurationContract
{
    /**
     * @param string|null $path
     */
    public function __construct(?string $path);

    /**
     * @param string $option
     * @return mixed
     */
    public function __get(string $option): mixed;
}