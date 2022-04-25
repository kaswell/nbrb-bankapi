<?php

namespace Kaswell\NbrbBankApi\Traits;

use Kaswell\NbrbBankApi\StrHelper;

/**
 * Class HasAccessors
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasAccessors
{
    /**
     * @param string $property
     * @return bool
     */
    public function hasAccessor(string $property): bool
    {
        return method_exists($this, $this->getAccessor($property));
    }

    /**
     * @param string $property
     * @return string
     */
    public function getAccessor(string $property): string
    {
        return 'get' . StrHelper::studly($property).'Property';
    }
}