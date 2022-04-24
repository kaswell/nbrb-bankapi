<?php

namespace Kaswell\NbrbBankApi\Contracts;

/**
 * Interface HasProperties
 * @package Kaswell\NbrbBankApi\Contracts
 */
interface HasProperties
{
    /**
     * @param string $property
     * @return bool
     */
    public function hasProperty(string $property): bool;

    /**
     * @param string $property
     * @param mixed $value
     */
    public function setProperty(string $property, mixed $value): void;

    /**
     * @param string $property
     * @return mixed
     */
    public function getProperty(string $property): mixed;
}