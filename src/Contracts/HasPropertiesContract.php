<?php

namespace Kaswell\NbrbBankApi\Contracts;

/**
 * Interface HasPropertiesContract
 * @package Kaswell\NbrbBankApi\Contracts
 */
interface HasPropertiesContract
{
    /**
     * @param string $property
     * @return bool
     */
    public function hasProperty(string $property): bool;

    /**
     * @param string $property
     * @param mixed $value
     * @return void
     */
    public function setProperty(string $property, mixed $value): void;

    /**
     * @param string $property
     * @return mixed
     */
    public function getProperty(string $property): mixed;
}