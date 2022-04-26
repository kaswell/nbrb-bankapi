<?php

namespace Kaswell\NbrbBankApi\Abstracts;

use Exception;
use Kaswell\NbrbBankApi\Contracts\ValidatorContract;

abstract class Validator implements ValidatorContract
{
    /**
     * @var bool
     */
    protected bool $isInvalid = false;

    /**
     * @var Exception|null
     */
    protected ?Exception $exception = null;

    /**
     * @param ...$request_data
     * @return bool
     */
    abstract public function validate(...$request_data): bool;

    /**
     * @return Exception|null
     */
    public function exception(): ?Exception
    {
        return $this->exception;
    }
}