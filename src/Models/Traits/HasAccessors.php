<?php

namespace Kaswell\NbrbBankApi\Models\Traits;

use Kaswell\NbrbBankApi\Helpers\Str;

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
        return 'get' . Str::studly($property).'Property';
    }
}