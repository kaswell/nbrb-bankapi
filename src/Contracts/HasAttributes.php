<?php

namespace Kaswell\NbrbBankApi\Contracts;

/**
 * Interface HasAttributes
 * @package Kaswell\NbrbBankApi\Contracts
 */
interface HasAttributes
{
    /**
     * @param string $key
     * @return bool
     */
    public function hasAttribute(string $key): bool;

    /**
     * @param string $key
     * @return mixed
     */
    public function getAttribute(string $key): mixed;

    /**
     * @param string $key
     * @param mixed $value
     */
    public function setAttribute(string $key, mixed $value): void;
}