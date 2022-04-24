<?php

namespace Kaswell\NbrbBankApi\Contracts;

/**
 * Interface ArrayableContract
 * @package Kaswell\NbrbBankApi\Contracts
 */
interface ArrayableContract
{
    /**
     * @return array
     */
    public function toArray(): array;
}