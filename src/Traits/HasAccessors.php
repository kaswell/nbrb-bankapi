<?php

namespace Kaswell\NbrbBankApi\Traits;

use Kaswell\NbrbBankApi\Helpers\Str;

/**
 * Class HasAccessors
 * @package Kaswell\NbrbBankApi\Traits
 */
trait HasAccessors
{
    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property): mixed
    {
        if ($this->hasAccessor($property)){
            $accessor = $this->getAccessor($property);

            return $accessor();
        }

        return $this->{$property};
    }

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