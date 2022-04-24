<?php

namespace Kaswell\NbrbBankApi\Contracts;

/**
 * Interface HasAttributes
 * @package Kaswell\NbrbBankApi\Contracts
 */
interface HasAttributes
{
    public function getAttribute($key): mixed;
}