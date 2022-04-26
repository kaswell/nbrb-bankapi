<?php

namespace Kaswell\NbrbBankApi\Abstracts;

abstract class Validator
{
    /**
     * @var bool
     */
    protected bool $isInvalid = false;

    /**
     * @param ...$request_data
     * @return bool
     */
    abstract public function validate(...$request_data): bool;
}